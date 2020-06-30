
<?php
session_start();
include 'connection/config.php';
$sms=$sms_err = $sms_succ ="";
$email = $password= '';
$error = $success ='';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = run_query("select * from users
            where email ='{$email}'");
	$user = mysqli_fetch_assoc($user);

    if ($email != $user['email']) {
        $sms = "Invalid Email or Password!";
        
    } else {
        if($user['password']!=md5($password)){
            $sms = "Invalid Email or Password!";
            echo $sms;
        }else{
			$sms_succ = 'alert alert-success';
            $success = 'Login Successfull!';
            echo $success;
        }
        
	}
	$sms_err = 'alert alert-danger';
	$error = "Invalid email or password!!";

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Paper</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, .98);
            z-index: 9998;
            text-align: center;
        }
    </style>
</head>
<body>
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <img class="plane" src="assets/img/basic/preloader-logo.png" alt="">
    </div>
</div>

<div id="app" class="paper-loading">
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="text-center">
                        <img src="assets/img/dummy/u5.png" alt=""/>
                        <h2>Welcome Back</h2>
                        <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff
                            waiting for you</p>
                    </div>
                    <form action="login.php">
                        <div class="form-group has-icon">
                            <i class="icon-envelope-o"></i>
                            <input type="text" name="email" class="form-control input-lg"
                                   placeholder="Email Address"/>
                        </div>
                        <div class="form-group has-icon">
                            <i class="icon-user-secret"></i>
                            <input type="text" name="password" class="form-control input-lg"
                                   placeholder="Password"/>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In">
                        <p class="forget-pass">Have you forgot your username or password ? </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
</div>
<!--End Page page_wrrapper -->
<script src="assets/js/app.js"></script>
<script>
    /*=========Place Google Tracker Code here===========*/
</script>
</body>
</html>