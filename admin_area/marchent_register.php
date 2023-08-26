<?php
     session_start();
  
    include("includes/db.php");
  //  include("functions/functions.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/register.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
    Register as Service Provider
    </div>
<form action="marchent_register.php" method="post">   
    <div class="form">
       <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" name="m_name" required >
       </div>  
       
       <div class="inputfield">
          <label>User Name</label>
          <input type="text" class="input" name="username" required >
       </div>  
       
       
       <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" class="form-control" name="m_email" required>
       </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input" name="m_contact" required>
       </div>  
       <div class="inputfield">
          <label>User Address</label>
          <textarea class="textarea" name="m_address" required></textarea>
       </div> 

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="m_pass" required>
       </div>  

      <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input">
       </div> 
       <div class="inputfield">
          <label>Shop Name</label>
          <input type="text" class="input" class="form-control" name="shop_name" required>
       </div>

       <div class="inputfield">
          <label>Shop Address</label>
          <textarea class="textarea" name="shop_address" required></textarea>
       </div> 
       <div class="inputfield">
          <label>What service you will provide</label>
          <div class="custom_select" name="service_catagory" required>
            <select >
              <option value="">Select</option>
              <option value="Electrician">Electrician</option>
              <option value="AC Servicing">AC Servicing</option>
              <option value="Plumbing & Sanitary Services">Plumbing & Sanitary Services</option>
              <option value="Gas Stove Repair">Gas Stove Repair</option>
              <option value="Decorators">Decorators </option>
              <option value="Catering Service">Catering Service</option>
              <option value="Bike Servicing">Bike Servicing</option>
              <option value="Car Servicing">Car Servicing</option>
              <option value="Car Renatal">Car Renatal</option>
              <option value="Internet Service Provider">Internet Service Provider</option>
            </select>
          </div>
       </div> 

       <div class="inputfield">
          <label>Provide Your Service Details</label>
          <textarea class="textarea" name="service_details" required></textarea>
       </div> 

       
      <div class="inputfield">
          <label>National Id Card No.</label>
          <input type="text" class="input" name="nid" required>
       </div> 
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
       
       <div class="text-center"><!-- text-center Begin -->
                               
         <button type="submit" name="register" class="btn btn-primary">
                               
        <i class="fa fa-user-md"></i> Register
                               
        </button>
                               
        </div><!-- text-center Finish --> 

        <div class = "want_login">
            <a href="login.php">If Already Have an Account? Login Now</a>

        </div>
        </form><!-- form Finish -->
    </div>
</div>	
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

</body>
</html>  
   
<?php
global $con;
if(isset($_POST['register'])){
    
    $m_name = $_POST['m_name'];

    $username = $_POST['username'];
    
    $m_email = $_POST['m_email'];
    
    $m_pass = $_POST['m_pass'];
    
    $m_contact = $_POST['m_contact'];
    
    $m_address = $_POST['m_address'];
   
    $shop_name = $_POST['shop_name'];
  
    $shop_address = $_POST['shop_address'];
  
    //$service_catagory = $_POST['service_catagory']; 
   
    $service_details = $_POST['service_details'];
   
    $nid = $_POST['nid'];

    $insert_marchent= "insert into marchent (marchent_name,m_username,marchent_email,marchent_contact,marchent_pass,marchent_address,shop_name,shop_address,service_details,nid_card) values ('$m_name',' $username','$m_email','$m_contact','$m_address','$shop_name','$shop_address','$service_details','$nid')";
    
    $run_marchent = mysqli_query($con,$insert_marchent);
    
    $_SESSION['marchent_email']=$m_email;
        
    echo "<script>alert('You have been Registered Sucessfully')</script>";
    
    echo "<script>window.open('index.php','_self')</script>";
}

  ?>  