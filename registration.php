<?php
session_start();
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
    <title>Registration</title>
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
    
  </head>
  <body>
    <div class="container" >
      <div class="form-box  border border-default jumbotron" id="status">
        <div class="m-auto p-4">
          <h2 class="text-primary">Create Account</h2>
          <form action="" class="" id="regForm">
            <div class="form-group">
              <label for="">First Name</label>
              <input type="text" class="form-control" name="fname" id="rFname" aria-describedby="emailHelpId" placeholder="Enter your First Name" required>
            </div>
            <div class="form-group">
              <label for="">Last Name</label>
              <input type="text" class="form-control" name="lname" id="rLname" aria-describedby="emailHelpId" placeholder="Enter your Last Name" required>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" id="rEmail" aria-describedby="emailHelpId" placeholder="Enter your Email" required>
              <div class="invalid-feedback" id="eEstate">
                
                </div>
              </div>
              <div class="form-group">
                <label for="">Password</label>
              <input type="password" minlength="10" class="form-control" name="password1" id="rPassword1" placeholder="password" required>
              <small id="emailHelpId" class="form-text text-muted">
                Minimum 10 characters. Must include uppercase, lowercase, and number(s).
              </small>
              <div class="invalid-feedback " id="ePstate1">
                
                </div>
              </div>
              <div class="form-group">
                <div id="rCaptch"></div>
                <input type="hidden" id="token" name="token">
                <div class="form-text text-danger" id="rCaptVal"></div>
              </div>
            <div class="form-group">
              <label for="">Re-type Password</label>
              <input type="password" class="form-control" name="password2" id="rPassword2" placeholder="confirm" required>
              <div class="invalid-feedback " id="ePstate2">
                
              </div>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" id="gRecaptcha" data-sitekey=""></div>
                <div class="rCaptcha"></div>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-success" name="Submit"><span class="ml-3 h5 text-danger"id="Estatus"></span>
            </div> 

          </form>
        </div>
        
      </div>
    </div>
  </div>
  <script>
    //! ============================ google recaptcha2  =========================
  
   
      var onloadCallback = function() {
    grecaptcha.render('gRecaptcha', {
          'sitekey' : 'site_key'
    });
  }
   
  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
    <script src="./js/main.js"></script>
</body>

</html>
<?php }?>
