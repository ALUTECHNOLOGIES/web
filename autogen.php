<?php

if (isset($_POST['amount']) && isset($_POST['phone'])) {
    stkPush($_POST['amount']);
}
           $phone =  $_POST['phone'];
           $amount = $_POST['amount'];
           $formatedPhone = substr($phone, 1);//726582228
           $code = "254";
           $phoneNumber = $code.$formatedPhone;//254726582228
           $_SESSION['phone'] = $phoneNumber;
           $_SESSION['amount'] = $amount;



    

   function stkPush($amount)
   {
        $amount = '10'; //Amount to transact 
        $phoneNumber = '0790019863'; // Phone number paying
        $Account_no = 'ALU HOTSPOT'; // Enter account number optional
        $url = 'https://tinypesa.com/api/v1/express/initialize';
        $data = array(
            'amount' => $amount,
            'msisdn' => $phoneNumber,
            'account_no'=>$Account_no
        );
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'ApiKey: VBDhssHATDo' // Replace with your api key
         );
        $info = http_build_query($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $resp = curl_exec($curl);
        $msg_resp = json_decode($resp);

        if($msg_resp ->success == 'true'){
            echo "WAIT FOR NEVEREST STK POP UP";
        }


 }
$_SESSION['simu'] = $phone;
$_SESSION['saa'] = (date("Ymdhms"));

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

    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" name="mpesaconfirm" action="./confirm.php" method="post">

                    <span class="login100-form-title p-b-55">
                        Please enter your mpesa pin on the popup that will appear on your phone then click on "PAID" below
                    </span>
                    <input type="hidden" name="check" value="<?php echo $_SESSION['check']; ?>" />
  
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            <input class="login100-form-btn" type="submit" value="PAID" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    
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