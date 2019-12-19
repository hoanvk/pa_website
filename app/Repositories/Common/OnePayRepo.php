<?php
namespace App\Repositories\Common;

use Illuminate\Support\Str;

class OnePayRepo implements IOnePayRepo{
  
  public function buildLocalGw($policy_header, $items){
    
    
    
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
            $value = Str::replaceFirst('{policy_id}',$policy_header->id, $value);        
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
  public function updateLocalGw($policy_header, $vpc_response)
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
    
    
    $vpc_Txn_Secure_Hash = $vpc_response['vpc_SecureHash'];
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
    if($policy_header->premium != $amount/100){
      $transStatus = "5";
    }
    elseif($policy_header->quotation_no != $merchTxnRef){
      $transStatus = "3";
    }
    elseif($hashValidated=="CORRECT" && $txnResponseCode=="0"){
      $transStatus = $txnResponseCode;
      
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
  public function buildInterGw($policy_header,$items){
    //Version 2.0

    // *********************
    // START OF MAIN PROGRAM
    // *********************

    // Define Constants
    // ----------------
    // This is secret for encoding the MD5 hash
    // This secret will vary from merchant to merchant
    // To not create a secure hash, let SECURE_SECRET be an empty string - ""
    // $SECURE_SECRET = "secure-hash-secret";
    $SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120DB";

    $vpcURL = '';    
    $vpcQuery = '';

    // The URL link for the receipt to do another transaction.
    // Note: This is ONLY used for this example and is not required for 
    // production code. You would hard code your own URL into your application.

    // Get and URL Encode the AgainLink. Add the AgainLink to the array
    // Shows how a user field (such as application SessionIDs) could be added

    //$_POST['AgainLink']=urlencode($_SERVER['HTTP_REFERER']);
    // Create the request to the Virtual Payment Client which is a URL encoded GET
    // request. Since we are looping through all the data we may as well sort it in
    // case we want to create a secure hash and add it to the VPC data if the
    // merchant secret has been provided.
    //$md5HashData = $SECURE_SECRET; Khởi tạo chuỗi dữ liệu mã hóa trống
    $md5HashData = "";

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
          
          }else if ($key=='vpc_ReturnURL' || $key=='AgainLink'){
            $value = Str::replaceFirst('{policy_id}',$policy_header->id, $value);        
          }
          $vpcQuery .= urlencode($key) . "=" . urlencode($value);
          // create the md5 input and URL leaving out any fields that have no value
          // tạo chuỗi đầu dữ liệu những tham số có dữ liệu
          
          // this ensures the first paramter of the URL is preceded by the '?' char


          //$stringHashData .= $value; *****************************sử dụng cả tên và giá trị tham số để mã hóa*****************************
          if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
            $md5HashData .= $key . "=" . $value . "&";
            }
        }        
      }
    }

    $vpcURL .= $vpcQuery;


    //xóa ký tự & ở thừa ở cuối chuỗi dữ liệu mã hóa
    $md5HashData = rtrim($md5HashData, "&");
    // Create the secure hash and append it to the Virtual Payment Client Data if
    // the merchant secret has been provided.
    if (strlen($SECURE_SECRET) > 0) {
        //$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
        // Thay hàm mã hóa dữ liệu
        $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
    }
    return $vpcURL;
    // FINISH TRANSACTION - Redirect the customers using the Digital Order
    // ===================================================================
    // header("Location: ".$vpcURL);

    // *******************
    // END OF MAIN PROGRAM
    // *******************

  }
  public function updateInterGw($policy_header, $vpc_response){
    // *********************
    // START OF MAIN PROGRAM
    // *********************

    // Define Constants
    // ----------------
    // This is secret for encoding the MD5 hash
    // This secret will vary from merchant to merchant
    // To not create a secure hash, let SECURE_SECRET be an empty string - ""
    // $SECURE_SECRET = "secure-hash-secret";
    $SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120DB";

    // get and remove the vpc_TxnResponseCode code from the response fields as we
    // do not want to include this field in the hash calculation
    
    $vpc_Txn_Secure_Hash = $vpc_response['vpc_SecureHash'];
    unset ( $vpc_response["vpc_SecureHash"] );

    $vpc_MerchTxnRef = $vpc_response["vpc_MerchTxnRef"];
    $vpc_AcqResponseCode = $vpc_response["vpc_AcqResponseCode"];
    
    // set a flag to indicate if hash has been validated
    $errorExists = false;

    if (strlen($SECURE_SECRET) > 0 && $vpc_response["vpc_TxnResponseCode"] != "7" && $vpc_response["vpc_TxnResponseCode"] != "No Value Returned") {

        
        //$md5HashData = $SECURE_SECRET;
        //khởi tạo chuỗi mã hóa rỗng
        $md5HashData = "";
        // sort all the incoming vpc response fields and leave out any with no value
        foreach ($_GET as $key => $value) {
    //        if ($key != "vpc_SecureHash" or strlen($value) > 0) {
    //            $md5HashData .= $value;
    //        }
    //      chỉ lấy các tham số bắt đầu bằng "vpc_" hoặc "user_" và khác trống và không phải chuỗi hash code trả về
            if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
            $md5HashData .= $key . "=" . $value . "&";
        }
        }
    //  Xóa dấu & thừa cuối chuỗi dữ liệu
        $md5HashData = rtrim($md5HashData, "&");

    //    if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper ( md5 ( $md5HashData ) )) {
    //    Thay hàm tạo chuỗi mã hóa
      if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)))) {
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
      return "101";
    }
    // Define Variables
    // ----------------
    // Extract the available receipt fields from the VPC Response
    // If not present then let the value be equal to 'No Value Returned'

    // Standard Receipt Data
    $amount = $this->null2unknown($vpc_response["vpc_Amount"]);
    $locale = $this->null2unknown($vpc_response["vpc_Locale"]);
    $batchNo = $this->null2unknown($vpc_response["vpc_BatchNo"]);
    $command = $this->null2unknown($vpc_response["vpc_Command"]);
    $message = $this->null2unknown($vpc_response["vpc_Message"]);
    $version = $this->null2unknown($vpc_response["vpc_Version"]);
    $cardType = $this->null2unknown($vpc_response["vpc_Card"]);
    $orderInfo = $this->null2unknown($vpc_response["vpc_OrderInfo"]);
    $receiptNo = $this->null2unknown($vpc_response["vpc_ReceiptNo"]);
    $merchantID = $this->null2unknown($vpc_response["vpc_Merchant"]);
    //$authorizeID = null2unknown($_GET["vpc_AuthorizeId"]);
    $merchTxnRef = $this->null2unknown($vpc_response["vpc_MerchTxnRef"]);
    $transactionNo = $this->null2unknown($vpc_response["vpc_TransactionNo"]);
    $acqResponseCode = $this->null2unknown($vpc_response["vpc_AcqResponseCode"]);
    $txnResponseCode = $this->null2unknown($vpc_response["vpc_TxnResponseCode"]);
    // 3-D Secure Data
    $verType = array_key_exists("vpc_VerType", $vpc_response) ? $vpc_response["vpc_VerType"] : "No Value Returned";
    $verStatus = array_key_exists("vpc_VerStatus", $vpc_response) ? $vpc_response["vpc_VerStatus"] : "No Value Returned";
    $token = array_key_exists("vpc_VerToken", $_GET) ? $_GET["vpc_VerToken"] : "No Value Returned";
    $verSecurLevel = array_key_exists("vpc_VerSecurityLevel", $vpc_response) ? $vpc_response["vpc_VerSecurityLevel"] : "No Value Returned";
    $enrolled = array_key_exists("vpc_3DSenrolled", $vpc_response) ? $vpc_response["vpc_3DSenrolled"] : "No Value Returned";
    $xid = array_key_exists("vpc_3DSXID", $vpc_response) ? $vpc_response["vpc_3DSXID"] : "No Value Returned";
    $acqECI = array_key_exists("vpc_3DSECI", $vpc_response) ? $vpc_response["vpc_3DSECI"] : "No Value Returned";
    $authStatus = array_key_exists("vpc_3DSstatus", $vpc_response) ? $vpc_response["vpc_3DSstatus"] : "No Value Returned";

    // *******************
    // END OF MAIN PROGRAM
    // *******************

    // FINISH TRANSACTION - Process the VPC Response Data
    // =====================================================
    // For the purposes of demonstration, we simply display the Result fields on a
    // web page.

    
    
    // The URL link for the receipt to do another transaction.
    // Note: This is ONLY used for this example and is not required for 
    // production code. You would hard code your own URL into your application
    // to allow customers to try another transaction.
    //TK//$againLink = URLDecode($_GET["AgainLink"]);


    $transStatus = "";
    if($policy_header->premium != $amount/100){
      $transStatus = "5";
    }
    elseif($policy_header->quotation_no != $merchTxnRef){
      $transStatus = "3";
    }elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
      $transStatus = "101";
    }else {
      $transStatus = $txnResponseCode;
    }
    return $transStatus;
  }
}