<?php
// Initialize the session
session_start();
include_once './controller/sessions.php';


// Check if the user is logged in, if not then redirect him to login page (loing.phpl)
if(!isset($_SESSION["userId"]) || $_SESSION["userId"] != true){
    header("location: index.php");
    exit;
}
else {
    include './controller/user_data.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Profile</title>
<link rel="stylesheet" 
href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .page-style{
        margin: 20px;        
    }
</style>
</head>
<body>
    <div class="container m-auto">
        <div class="m-5 jumbotron">

            <div class="page-header mt-5 text-primary">
                <h4>Hi, <?php echo $result["uFirstName"]." ".$result["uLastName"]; ?></h4>
            </div>
            <div class="page-header">
                <h4>Welcome to our E-Commerce Site.</h4>
            </div>
            <div class="m-auto">
                
                </div>
                <p>
                    <a href="logout.php" class="btn btn-danger ">Sign Out of Your Account</a>
                </p>
            </div>
        </div>
</body>
</html>
<?php }?>