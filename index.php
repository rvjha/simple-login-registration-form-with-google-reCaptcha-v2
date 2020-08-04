<?php
// Initialize the session
session_start();
include_once './controller/sessions.php';
if(@$_SESSION["userId"]){
    header("location: home.php");
    exit;
  }
  else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Login</title>
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">
        <div class="form-box jumbotron border border-default">
            <div class="m-auto p-4">
                <h4 class="text-primary">User Login</h4>
                <form action="" method="post" id="logForm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="lEmail" name="email" placeholder="Enter your registered Email"required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="lPass" name="password" placeholder="Enter your Password"required>
                        <small id="emailHelpId" class="form-text text-muted">
                            <input type="checkbox" name="remember me" id="lRem">
                            Remember my Email.
                        </small>
                    </div>
                    <input  name="loginButton" id="lLogin" class="btn btn-primary" type="submit" value="Login">
                    <span class="h6 text-danger m-2" id='eState'></span>
                    <div class="form-group mt-2">  
                        <span class="text-primary mr-5">Not a user register</span>
                        <a href="signup.php" class="ml-3">Sign Up</a>            
                    </div>

                    </form>
                </form>
            </div>
        </div>
    </div>  

    <!-- Modal -->
    <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Otp Validation</h5>
                    <div class="text-danger text-center mx-auto" id="oEstate"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <form action="" class="" id="otpForm">
                            <p>
                                <strong>We have sent a secret code to your email.
                                    <br>
                                    Please check your email and insert the code in the following input field:
                                </strong>
                            </p>
                            <div class="form-group">
                            <label for=""class="text-muted"> <strong>Two Factor Authentication code:</strong> </label>
                            <input type="hidden" name="uId" id="uId">
                            <input type="text" class="form-control" maxlength="6" name="sCodeIn" id="sCodeIn" aria-describedby="emailHelpId" placeholder="Enter Otp" required>
                            <input name="sCodeBt" id="sCodeBt" class="btn btn-primary" type="submit" value="Verify Code">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="./js/main.js"></script>
    </body>
    
    </html>
<?php }?>
