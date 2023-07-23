<?php
    $active='Booking';
    include_once("includes/header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Service
                   </li>

                   <li>
                       <a href="service.php?s_cat=<?php echo $s_cat_id; ?>"><?php echo $s_cat_ti; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                   <center><img class="img-responsive" src="admin_area/service_images/<?php echo $pro_img1; ?>" alt="Service 3-a"></center>
                                   </div>
                                   
                               </div>
                               
                               
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                       <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                         
                       <?php 
                        add_booking(); 
                       ?>
                       
                       <form action="details.php?add_booking=<?php echo $service_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               
                           <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Booking Reason</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                      <input type="text" name="booking_reason" id ="booking_reason" value="">     
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Booking Date</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <input type="date" name="booking_date" id ="booking_date" value="">
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                               <p class="price"> <?php echo $pro_price; ?> Tk</p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping"> Add </button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                       <h4>Service Details</h4>
                   
                   <p>
                       
                   <?php echo $pro_desc; ?>
                       
                   </p>
                   
                      
                   
               </div><!-- box Finish -->
               
             
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>