<?php
session_start();
include 'connection/config.php';
$smsD=$smsS=$sms_err = $sms_succ =$i="";
$name =$email= $confirm_password = $password= '';
$error = $success ='';
if (isset($_POST['first_name'])) {
	$name = $_POST['first_name'] ;
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	if($password == $confirm_password){
		$pass = md5($password);
		$user ="insert into users (name, email, password, active)
							values('{$name}','{$email}', '{$pass}', '1')
			";
        $i = run_non_query($user);
        
		if($i > 0){
			$smsS = "alert alert-success";
			$sms_succ = 'Data has been saved!';
		}else{
			$smsD = "alert alert-danger";
			$sms_err = "Save data Failed!";
		}
	// }else{
	// 	$smsD = "alert alert-danger";
	// 	$sms_err = "Password not match!";
    }



    
   
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

        <div class="page-template-template-card">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="container">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="card">
                                <header class="text-center">
                                    <h1 class="section-title">Create New Account</h1>
                                    <p class="section-subtitle">Join Our wonderful community and let others help you without a single penny</p>
                                </header>
                                <div class="icon">
                                    <img src="assets/img/icon/icon-join.png" alt="" />
                                </div>
                                <form action="" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" class="form-control input-lg" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="form-control input-lg" placeholder="Last Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control input-lg" placeholder="Email Address"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control input-lg" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="confirm_password" class="form-control input-lg" placeholder="Confirm Password"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Create Account">
                                            <p class="forget-pass">A verification email wil be sent to you</p>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
    

    </div>
    <!--End Page page_wrrapper -->
    <script src="assets/js/app.js"></script>
    <script>
    /*=========Place Google Tracker Code here===========*/
    </script>
</body>

</html>