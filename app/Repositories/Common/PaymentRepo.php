<?php
namespace App\Repositories\Common;

use App\Models\Master\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Common\Invoice;
use App\Models\Common\Customer;
use App\Models\Common\OnePayLog;
use App\Models\Common\PolicyTrans;
use App\Models\Common\PolicyHeader;
use App\Repositories\PA\IPAPremium;
use App\Repositories\Common\IOnePayRepo;

class PaymentRepo implements IPaymentRepo{
  protected $dateUtil;
  protected $repository;
  protected $gateway;
    public function __construct(IDateUtil $dateUtil, IPAPremium $repository, IOnePayRepo $gateway) 
    {
        $this->dateUtil = $dateUtil;
        $this->repository = $repository;
        $this->gateway = $gateway;
    } 
    public function checkPolicyStatus($policy_id){
      $policyHeader = PolicyHeader::find($policy_id);
      /**
       * status 4: updated insured person
       */
      return ($policyHeader->status != 4);
    }  
  public function buildOnePayGateway($policy_id){
    
    $policy_header = PolicyHeader::find($policy_id);
    $paymentUrl = '';
    /**
     * Check I: international D: domestic
     */
    if ($policy_header->pay_method == 'D') {
      $items = Item::where('item_tabl','=','TV411')->orderBy('item_item')->get();
      $paymentUrl = $this->gateway->buildLocalGw($policy_header, $items);
    }
    else{
      $items = Item::where('item_tabl','=','TV412')->orderBy('item_item')->get();
      $paymentUrl = $this->gateway->buildInterGw($policy_header, $items);
    } 
    OnePayLog::create(['policy_id'=>$policy_id, 'request_url'=>$paymentUrl]);
    return $paymentUrl;
  }
  public function updateOnePayGateway($policy_id, Request $request)
  {
    $policy_header = PolicyHeader::find($policy_id);
    $vpc_response = $request->all();

    /**
     * Log payment response
     */
    
    $onePayLog = OnePayLog::where('policy_id','=',$policy_id)
      ->orderByDesc('id')->first();
      if ($onePayLog) {
        $onePayLog->update(['response_url'=> collect($vpc_response)->toJson()]);
      }
    // dd($vpc_response);
    /**
     * Check I: international D: domestic
     */
    $tranStatus = '0';
    if ($policy_header->pay_method == 'D') {
      $tranStatus = $this->gateway->updateLocalGw($policy_header, $vpc_response);
    }
    else{
      $tranStatus = $this->gateway->updateInterGw($policy_header, $vpc_response);
    } 

    if ($tranStatus == '0') {
      
      $policy_no = $this->repository->policyNumber($policy_header->product_id);

      PolicyTrans::create(['tran_type'=>'40','tran_stat'=>'P','header_id'=>$policy_id,
        'tran_date'=>$this->dateUtil->today(),'policy_no'=>$policy_no]); 

      $policy_header->update(['policy_no'=>$policy_no, 'status'=>'5']);
    }
    return $tranStatus; 
  }
  
  public function getOnePayError($responseCode) {
	
    switch ($responseCode) {
      case "0" :
        $result = "Giao dịch thành công - Approved";
        break;
      case "1" :
        $result = "Ngân hàng từ chối giao dịch - Bank Declined";
        break;
      case "3" :
        $result = "Mã đơn vị không tồn tại - Merchant not exist";
        break;
      case "4" :
        $result = "Không đúng access code - Invalid access code";
        break;
      case "5" :
        $result = "Số tiền không hợp lệ - Invalid amount";
        break;
      case "6" :
        $result = "Mã tiền tệ không tồn tại - Invalid currency code";
        break;
      case "7" :
        $result = "Lỗi không xác định - Unspecified Failure ";
        break;
      case "8" :
        $result = "Số thẻ không đúng - Invalid card Number";
        break;
      case "9" :
        $result = "Tên chủ thẻ không đúng - Invalid card name";
        break;
      case "10" :
        $result = "Thẻ hết hạn/Thẻ bị khóa - Expired Card";
        break;
      case "11" :
        $result = "Thẻ chưa đăng ký sử dụng dịch vụ - Card Not Registed Service(internet banking)";
        break;
      case "12" :
        $result = "Ngày phát hành/Hết hạn không đúng - Invalid card date";
        break;
      case "13" :
        $result = "Vượt quá hạn mức thanh toán - Exist Amount";
        break;
      case "21" :
        $result = "Số tiền không đủ để thanh toán - Insufficient fund";
        break;
      case "99" :
        $result = "Người sủ dụng hủy giao dịch - User cancel";
        break;
      case "101" :
          $result = "Secure Hash validation failed";
          break;
      case "102" :
        $result = "Giao dịch Pending";
        break;
      default :
        $result = "Giao dịch thất bại - Failured";
    }
    return $result;
  }
  public function getVATInvoice($policy_id){
    $invoice = Invoice::where('policy_id','=',$policy_id)->first();
    if ($invoice === null) {
      $customer = Customer::where('policy_id','=',$policy_id)->first();
      
      $invoice = new Invoice();
      $invoice->inv_name = $customer->name;
      $invoice->inv_address = $customer->address;
      $invoice->inv_taxcode = $customer->tgram;
    }
    return $invoice;
  }
  public function updateVATInvoice($policy_id, $inv_name, $inv_address, $inv_taxcode, $pay_method){
    $invoice = Invoice::where('policy_id','=',$policy_id)->first();
    $policyHeader = PolicyHeader::find($policy_id);
    $policyHeader->update(['pay_method'=>$pay_method]);

    if ($invoice === null) {
    
      $customer = $policyHeader->customer();
      $invoice = Invoice::create(['policy_id'=>$policy_id,
      'inv_name'=>$inv_name, 'inv_address'=>$inv_address, 'inv_taxcode'=>$inv_taxcode,
      ]);
    }else{
      $invoice->update(['inv_name'=>$inv_name, 'inv_address'=>$inv_address, 'inv_taxcode'=>$inv_taxcode]);
    }
    return $invoice;
  }
}