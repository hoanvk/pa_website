<?php
namespace App\Repositories\Common;
class PaymentRepo implements IPaymentRepo{
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
    $vpcURL = Item::where('item_tabl','=','TV411')
      ->where('short_desc','=','url')->first()->long_desc . "?";    

      $vpcURL .= urlencode('vpc_MerchTxnRef').'='.urlencode($policy_header->quotation_no);  
      $vpcURL .= '&' . urlencode('vpc_Amount').'='.urlencode($policy_header->premium);
    //$stringHashData = $SECURE_SECRET; *****************************Khởi tạo chuỗi dữ liệu mã hóa trống*****************************
    $stringHashData = "";
    
    
    $items = Item::where('item_tabl','=','TV411')
      ->where('short_desc','!=','url')->get();
    foreach($items as $item) {
      $key = $item->short_desc;
      $value = $item->long_desc;
      // create the md5 input and URL leaving out any fields that have no value
      // tạo chuỗi đầu dữ liệu những tham số có dữ liệu
      if (strlen($value) > 0) {
        // this ensures the first paramter of the URL is preceded by the '?' char
        $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);

        //$stringHashData .= $value; *****************************sử dụng cả tên và giá trị tham số để mã hóa*****************************
        if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
        $stringHashData .= $key . "=" . $value . "&";
        }
      }
    }
    //*****************************xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa*****************************
    $stringHashData = rtrim($stringHashData, "&");
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
}