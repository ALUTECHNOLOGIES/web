<?php
session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hamptons Cafe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
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

    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" name="mpesadeduction" action="./autogen.php" method="post">

                    <span class="login100-form-title p-b-55">
                        Enter Phone number to be deducted
                    </span>
                    <input type="hidden" name="amount" value="10" />

                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" name="phone" type="number" placeholder="Phone">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                    </div>

                    
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            <input class="login100-form-btn" type="submit" value="PROCEED" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
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