<?php
namespace App\Repositories\Common;

use App\Models\Master\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Common\PolicyTrans;
use App\Models\Common\PolicyHeader;
use App\Repositories\PA\IPAPremium;

class PaymentRepo implements IPaymentRepo{
  protected $dateUtil;
  protected $repository;
    public function __construct(IDateUtil $dateUtil, IPAPremium $repository) 
    {
        $this->dateUtil = $dateUtil;
        $this->repository = $repository;
    } 
  public function buildOnePayGateway($policy_id){
    
    $policy_header = PolicyHeader::find($policy_id);
    
    /* -----------------------------------------------------------------------------

    Version 2.0

    @author OnePAY

    ------------------------------------------------------------------------------*/

    // *********************
    // START OF MAIN PROGRAM
    // *********************

    // Define Constants
    // ----------------
    // This is secret for encoding the MD5 hash
    // This secret will vary from merchant to merchant
    // To not create a secure hash, let SECURE_SECRET be an empty string - ""
    // $SECURE_SECRET = "secure-hash-secret";
    // Khóa bí mật - được cấp bởi OnePAY
    $SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";

    // add the start of the vpcURL querystring parameters
    // *****************************Lấy giá trị url cổng thanh toán*****************************
    $vpcURL = '';    
    $vpcQuery = '';

    //$stringHashData = $SECURE_SECRET; *****************************Khởi tạo chuỗi dữ liệu mã hóa trống*****************************
    $stringHashData = "";
    
    
    $items = Item::where('item_tabl','=','TV411')->orderBy('item_item')->get();
    foreach($items as $item) {
      $key = $item->short_desc;
      $value = $item->long_desc;
      if (strlen($value) > 0) {
        
        if ($key=='virtualPaymentClientURL') {
          # code...         
          $vpcURL = $value . "?";  
        }else {

          //
          if (strlen($vpcQuery)>0){
            $vpcQuery .= '&';
          }

          if ($key=='vpc_MerchTxnRef'){
            $value = $policy_header->quotation_no;
            
          }else if ($key=='vpc_Amount'){
            $value = $policy_header->premium*100;
           
          }else if ($key=='vpc_ReturnURL'){
            $value = Str::replaceFirst('{policy_id}',$policy_id, $value);        
          }
          $vpcQuery .= urlencode($key) . "=" . urlencode($value);
          // create the md5 input and URL leaving out any fields that have no value
          // tạo chuỗi đầu dữ liệu những tham số có dữ liệu
          
          // this ensures the first paramter of the URL is preceded by the '?' char


          //$stringHashData .= $value; *****************************sử dụng cả tên và giá trị tham số để mã hóa*****************************
          if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
            $stringHashData .= $key . "=" . $value . "&";
            }
        }        
      }
    }
    
    $vpcURL .= $vpcQuery;
    
    //*****************************xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa*****************************
    $stringHashData = rtrim($stringHashData, "&");
    // dd($stringHashData);
    // Create the secure hash and append it to the Virtual Payment Client Data if
    // the merchant secret has been provided.
    // thêm giá trị chuỗi mã hóa dữ liệu được tạo ra ở trên vào cuối url
    if (strlen($SECURE_SECRET) > 0) {
        //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($stringHashData));
        // *****************************Thay hàm mã hóa dữ liệu*****************************
        $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)));
    }
   
    // FINISH TRANSACTION - Redirect the customers using the Digital Order
    // ===================================================================
    // chuyển trình duyệt sang cổng thanh toán theo URL được tạo ra
    //header("Location: ".$vpcURL);

    return $vpcURL;
    // *******************
    // END OF MAIN PROGRAM
    // *******************

  }
  public function updateOnePayGateway($policy_id, Request $request)
  {
    # code...
    /* -----------------------------------------------------------------------------

    Version 2.0

    --------------------------------------------------------------------------------

    @author OnePAy JSC

    ------------------------------------------------------------------------------*/

    // *********************
    // START OF MAIN PROGRAM
    // *********************


    // Define Constants
    // ----------------
    // This is secret for encoding the MD5 hash
    // This secret will vary from merchant to merchant
    // To not create a secure hash, let SECURE_SECRET be an empty string - ""
    // $SECURE_SECRET = "secure-hash-secret";
    $SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";

    // If there has been a merchant secret set then sort and loop through all the
    // data in the Virtual Payment Client response. While we have the data, we can
    // append all the fields that contain values (except the secure hash) so that
    // we can create a hash and validate it against the secure hash in the Virtual
    // Payment Client response.


    // NOTE: If the vpc_TxnResponseCode in not a single character then
    // there was a Virtual Payment Client error and we cannot accurately validate
    // the incoming data from the secure hash. */

    // get and remove the vpc_TxnResponseCode code from the response fields as we
    // do not want to include this field in the hash calculation
    $vpc_Txn_Secure_Hash = $request->input('vpc_SecureHash');
    $vpc_response = $request->all();
    unset ( $vpc_response["vpc_SecureHash"] );

    // set a flag to indicate if hash has been validated
    $errorExists = false;

    ksort ($vpc_response);

    if (strlen ( $SECURE_SECRET ) > 0 && $vpc_response ["vpc_TxnResponseCode"] != "7" && $vpc_response ["vpc_TxnResponseCode"] != "No Value Returned") {
      
      //$stringHashData = $SECURE_SECRET;
      //*****************************khởi tạo chuỗi mã hóa rỗng*****************************
      $stringHashData = "";
      
      // sort all the incoming vpc response fields and leave out any with no value
      foreach ( $vpc_response as $key => $value ) {
      //        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
      //            $stringHashData .= $value;
      //        }
      //      *****************************chỉ lấy các tham số bắt đầu bằng "vpc_" hoặc "user_" và khác trống và không phải chuỗi hash code trả về*****************************
        if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
          $stringHashData .= $key . "=" . $value . "&";
        }
      }
      //  *****************************Xóa dấu & thừa cuối chuỗi dữ liệu*****************************
      $stringHashData = rtrim($stringHashData, "&");	
      
      
      //    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $stringHashData ) )) {
      //    *****************************Thay hàm tạo chuỗi mã hóa*****************************
      if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)))) {
        // Secure Hash validation succeeded, add a data field to be displayed
        // later.
        $hashValidated = "CORRECT";
      } else {
        // Secure Hash validation failed, add a data field to be displayed
        // later.
        $hashValidated = "INVALID HASH";
      }
    } else {
      // Secure Hash was not validated, add a data field to be displayed later.
      $hashValidated = "INVALID HASH";
    }

    if ($hashValidated != "CORRECT") {
      # code...
      return "101";
    }
    
    // Define Variables
    // ----------------
    // Extract the available receipt fields from the VPC Response
    // If not present then let the value be equal to 'No Value Returned'
    // Standard Receipt Data
    $amount = $this->null2unknown ( $vpc_response ["vpc_Amount"] );
    $locale = $this->null2unknown ( $vpc_response ["vpc_Locale"] );
    //$batchNo = null2unknown ( $_GET ["vpc_BatchNo"] );
    $command = $this->null2unknown ( $vpc_response ["vpc_Command"] );
    //$message = null2unknown ( $_GET ["vpc_Message"] );
    $version = $this->null2unknown ( $vpc_response ["vpc_Version"] );
    //$cardType = null2unknown ( $_GET ["vpc_Card"] );
    $orderInfo = $this->null2unknown ( $vpc_response ["vpc_OrderInfo"] );
    //$receiptNo = null2unknown ( $_GET ["vpc_ReceiptNo"] );
    $merchantID = $this->null2unknown ( $vpc_response ["vpc_Merchant"] );
    //$authorizeID = null2unknown ( $_GET ["vpc_AuthorizeId"] );
    $merchTxnRef = $this->null2unknown ( $vpc_response ["vpc_MerchTxnRef"] );
    $transactionNo = $this->null2unknown ( $vpc_response ["vpc_TransactionNo"] );
    //$acqResponseCode = null2unknown ( $_GET ["vpc_AcqResponseCode"] );
    $txnResponseCode = $this->null2unknown ( $vpc_response ["vpc_TxnResponseCode"] );

    // This is the display title for 'Receipt' page 
    //$title = $_GET ["Title"];


    $transStatus = "";
    if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
      $transStatus = $txnResponseCode;
      /**
       * tran_type 40 generate certificate
       */
            
      $policyHeader = PolicyHeader::find($policy_id);
      $policy_no = $this->repository->policyNumber($policyHeader->product_id);

      PolicyTrans::create(['tran_type'=>'40','tran_stat'=>'P','header_id'=>$policy_id,
        'tran_date'=>$this->dateUtil->today(),'policy_no'=>$policy_no]); 

      $policyHeader->update(['policy_no'=>$policy_no, 'status'=>'2']);
      
    }elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
      $transStatus = "100";
    }else {
      $transStatus = $txnResponseCode;
    }
    return $transStatus;
  }
  function null2unknown($data) {
    if ($data == "") {
      return "No Value Returned";
    } else {
      return $data;
    }
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
      default :
        $result = "Giao dịch thất bại - Failured";
    }
    return $result;
  }
}