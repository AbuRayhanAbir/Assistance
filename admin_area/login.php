<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assistance</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Service Provider Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="marchent_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="marchent_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="marchent_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           <a href="marchent_register.php">If don't have account. Please Register</a>
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['marchent_login'])){
        
        $marchent_email = mysqli_real_escape_string($con,$_POST['marchent_email']);
        
        $marchent_pass = mysqli_real_escape_string($con,$_POST['marchent_pass']);
        
        $get_marchent = "select * from marchent where marchent_email ='$marchent_email' AND marchent_pass ='$marchent_pass'";
        
        $run_marchent = mysqli_query($con,$get_marchent);
        
        $count = mysqli_num_rows($run_marchent);
        
        if($count==1){
            
            $_SESSION['marchent_email']=$marchent_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>