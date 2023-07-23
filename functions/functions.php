<?php 

$db = mysqli_connect("localhost","root","","assistance");

/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// begin add_cart functions ///

function add_booking(){
    
    global $db;
    
    if(isset($_GET['add_booking'])){
        
        $ip_add = getRealIpUser();
        
        $s_id = $_GET['add_booking'];
        
        $booking_reason = $_POST['booking_reason'];
        
        $booking_date = $_POST['booking_date'];
        
        $check_product = "select * from booking where ip_add='$ip_add' AND s_id='$s_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Already booked')</script>";
            echo "<script>window.open('details.php?pro_id=$s_id','_self')</script>";
            
        }else{
            
            $query = "insert into booking (s_id,ip_add,booking_date,booking_reason) values ('$s_id','$ip_add','$booking_date','$booking_reason')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('details.php?pro_id=$s_id','_self')</script>";
            
        }
        
    }
    
}

/// finish add_cart functions ///

/// finish getRealIpUser functions ///


function getPro(){
    
    global $db;
    
    $get_service = "select * from services order by 1 DESC LIMIT 0,8";
    
    $run_service = mysqli_query($db,$get_service);
    
    while($row_service=mysqli_fetch_array($run_service)){
        
        $pro_id = $row_service['service_id'];
        
        $pro_title = $row_service['service_title'];
        
        $pro_price = $row_service['s_price'];
        
        $pro_img1 = $row_service['image'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='service'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/service_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add 

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
        
    }
    
}

/// finish getPro functions ///

/// begin getPCats functions ///

function getPCats(){
    
    global $db;
    
    $get_s_cats = "select * from service_categories";
    
    $run_s_cats = mysqli_query($db,$get_s_cats);
    
    while($row_s_cats=mysqli_fetch_array($run_s_cats)){
        
        $s_cat_id = $row_s_cats['s_cat_id'];
        
        $s_cat_ti = $row_s_cats['s_cat_ti'];
        
        echo "
        
            <li>
            
                <a href='service.php?s_cat=$s_cat_id'> $s_cat_ti </a>
            
            </li>
        
        ";
        
    }
    
}
    
/// finish getPCats functions ///

function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['s_cat'])){
        
        $s_cat_id = $_GET['s_cat'];
        
        $get_s_cat ="select * from service_categories where s_cat_id='$s_cat_id' LIMIT 0,6";
        
        $run_s_cat = mysqli_query($db,$get_s_cat);
        
        $row_s_cat = mysqli_fetch_array($run_s_cat);
        
        $s_cat_ti= $row_s_cat['s_cat_ti'];
       
        
        
        $get_services ="select * from services where s_cat_id='$s_cat_id'";
        
        $run_services = mysqli_query($db,$get_services);
        
        $count = mysqli_num_rows($run_services);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> No service Found In This service Categories </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $s_cat_ti </h1>
                    
                   
                
                </div>
            
            ";
            
        }
        
        while($row_services=mysqli_fetch_array($run_services)){
            
            $pro_id = $row_services['service_id'];
        
            $pro_title = $row_services['service_title'];

            $pro_price = $row_services['s_price'];

            $pro_img1 = $row_services['image'];
            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
        
            <div class='service'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/service_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                         $pro_price Tk
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping'></i> Add to Cart

                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
            
            ";
            
        }
        
    }
    
}

/// finish getpcatpro functions ///

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from booking where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from booking where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['s_id'];
        
     
        
        $get_price = "select * from services where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['s_price'];
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "$" . $total;
    
}

/// finish total_price functions ///

?>