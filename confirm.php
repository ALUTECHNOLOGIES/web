
<?php

    $checkoutRequestID = $_POST['check'];
    $phoneNumber = $_SESSION['phoneNumber'];
    $_SESSION['phoneNumber'] = $phoneNumber;
    //echo $phoneNumber;
 if (isset($_POST['check'])) {
    stkquery();
} 



//check if paids
function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = (date("Ymdhms"));
    //passkey
    $passKey ="5c5d9eedb1339dcdf4161ac150585187906b10c3a1a03488aa1fac44ae99179f";
    $businessShortCOde =7170374;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    return $mpesaPassword;
}

function newAccessToken()
   {
       $consumer_key="FEvESLXJ6CzUR3EC1xSOGZnehXMwbs0a";
       $consumer_secret="9WO6geBuxwtZRRf0";
       $credentials = base64_encode($consumer_key.":".$consumer_secret);
       $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $access_token=json_decode($curl_response);
       curl_close($curl);
       
       return $access_token->access_token;
   }
   
function stkquery()
{
$url1 = 'https://api.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $curl_post_data = array(
            'BusinessShortCode' => 7170374,
            'Password' => lipaNaMpesaPassword(),
            'Timestamp' => (date("Ymdhms")),
            'CheckoutRequestID' => $_SESSION['check']
        );

        $data_string = json_encode($curl_post_data);

         $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url1);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $curl_response = curl_exec($curl);

       //print_r($curl_response);
       $string1 = $curl_response;
      $string2 = json_encode($string1);

      if( isset( $string2 ) ) {


  function string_between_two_string($sstr, $starting_word, $ending_word){
    $arr = explode($starting_word, $sstr);
    if (isset($arr[1])){
        $arr = explode($ending_word, $arr[1]);
        return $arr[0];
    }
    return '';
  }
  
  $sstr = $string1;
  $start = 'ResultCode": "';
  $end = 'ResultDesc';
  $ssubstring = string_between_two_string($sstr, $start, $end);
  $ssubstring2 = str_replace(array('"','"'), '',$ssubstring);
  $ssubstring3 = str_replace(array(' ',' '), '',$ssubstring2);
  $resultCode1 = str_replace(array(',',','), '',$ssubstring3);
  $rc =   rtrim( $resultCode1 );
  //echo $rc;
  $resultCode = $rc; 
  $_SESSION['code'] = $resultCode;

}

}
$code = $_SESSION['code'];

if ($code == '0') {


$_SESSION['simu'] = $phone;

    

}  else {
 echo '<div class="pass-link" style="color: white;"> Sorry We did not receive your payment </div>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hamptons Cafe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="../images1/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" href="css/style.css">
<!--===============================================================================================-->
</head>
<body>
<!-- $(if chap-id) -->

    <form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
        <input type="hidden" name="username" />
        <input type="hidden" name="password" />
        <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
        <input type="hidden" name="popup" value="true" />
        <input type="hidden" name="username" value="<?php echo $uuser; ?>">
        <input type="hidden" name="password" value="<?php echo $pass; ?>">
    </form>
    
    <script type="text/javascript" src="./md5.js"></script>
    <script type="text/javascript">
    <!--
        function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
        document.sendin.submit();
        return false;
        }
    //-->
    </script>
<!-- $(endif) -->

<?php
  if ($_SESSION['code'] == '0') {
    $first = '<div class="wrapper">
    <div class="form-container">
        <div class="form-inner">
            
                <form class="login">

                    <div class="pass-link">';
    $second = '</div> </form> </div> </div> </div>';
    echo $first;
    echo "Username: "; echo $uuser;
    echo " Password: "; echo $pass;
    echo $second;

echo '
 
<div class="wrapper">
    <div class="form-container">
        <div class="form-inner">
            
                <form class="login">

                    <div class="pass-link">
                        Click on login below and use username and password displayed above/ sent to you via sms to login. 

                       
                    </div>
       
                <div class="pass-link">
                <a href="http://192.168.88.1/login.html">LOGIN</a></div>

                </form>
            
        </div>
    </div>
</div>
';

  $url = 'https://mysms.celcomafrica.com/api/services/sendsms/';
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header

  $curl_post_data = array(
          //Fill in the request parameters with valid values
         'partnerID' => '176',
         'apikey' => 'b9111e37ba7d35a89c3dff985250214b',
         'mobile' => $_SESSION['phoneNumber'],
         'message' => 'Your WIFI Ya Dhati Username is: ' . $uuser . '  Password:' . $pass,
         'shortcode' => 'CELCOM_SMS',
         'pass_type' => 'plain', //bm5 {base64 encode} or plain
  );

  $data_string = json_encode($curl_post_data);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

  $curl_response = curl_exec($curl);
  //print_r($curl_response);

  //endofsendsms




 } else {
 echo '<div class="wrapper">
    <div class="form-container">
        <div class="form-inner">
            
                <form class="login">

                    <div class="pass-link">
                        Sorry We did not receive your payment.

                       
                    </div>
                </form>
            
        </div>
    </div>
</div>';
}

?>

    <script type="text/javascript">
<!--
  document.login.username.focus();
//-->
</script>
    
<!--===============================================================================================-->  
    <script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor1/bootstrap/js/popper.js"></script>
    <script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="js1/main.js"></script>

</body>
</html>