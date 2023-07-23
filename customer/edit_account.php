<h1 align="center" >Edit Your Account</h1>
<form action="" method ="post" enctype ="multipart/from-data" >

    <div class ="form-group">
        <label >Name</label>
        <input type="text" name="c_name" class="form_control" required>
    </div>

    <div class ="form-group">
        <label >Email</label>
        <input type="email" name="c_email" class="form_control" required>
    </div>

    <div class ="form-group">
        <label >Phone NO</label>
        <input type="tel" name="c_contact" class="form_control" required>
    </div>

    <div class ="form-group">
        <label >Profile Picture</label>
        <input type="file" name="c_image" class="form_control form-height-custom" required>
        <img class ="image-responsive" src="customer_images/formal.jpg" alt="Customer Image" width ="150px" height ="150px">
    </div>
    <div class ="form-group">
        <label >Address</label>
        <input type="text" name="c_address" class="form_control" required>
    </div>

    <div class ="text-center">
        <button name="update" class="btn btn-primary" >
            <i class="fa fa-user-md"></i>Update Now
        </button>
        
    </div>


</form>