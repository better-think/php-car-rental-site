<?php 
session_start();
error_reporting(0);

include('includes/config.php');


if(isset($_POST['submit'])) {
  $accessorytitle=$_POST['accessorytitle'];
  $accessorytitleview=$_POST['accessorytitleview'];
  $accessoryimage=$_FILES["img1"]["name"];
  move_uploaded_file($_FILES["img1"]["tmp_name"],"img/accessories/".$_FILES["img1"]["name"]);
  $sql="INSERT INTO tblaccessories(AccessoriesTitle,AccessoriesOverview,Accessorieimage) 
  VALUES(:accessorytitle,:accessorytitleview,:accessoryimage)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':accessorytitle',$accessorytitle,PDO::PARAM_STR);
  $query->bindParam(':accessorytitleview',$accessorytitleview,PDO::PARAM_STR);
  $query->bindParam(':accessoryimage',$accessoryimage,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId){
      $msg="Accessory posted successfully";
  }
  else {
      $error="Something went wrong. Please try again";
  }
}



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Car Rental Portal</title>
  <!--Bootstrap -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"> -->
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 


  <script src="assets/MDB/js/jquery.min.js"></script>  
  <script src="assets/MDB/js/popper.min.js"></script>
  <script src="assets/MDB/js/bootstrap.min.js"></script>
  <script src="assets/MDB/js/mdb.min.js"></script>
  <script src="assets/MDB/js/addons-pro/multi-range.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/MDB/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/MDB/css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="assets/MDB/css/mdb.css" rel="stylesheet">
  <link href="assets/MDB/css/addons-pro/multi-range.min.css" rel="stylesheet">
  <link href="assets/MDB/css/style.css" rel="stylesheet">

  <!-- <link href="assets/MDB/material-select-view.min.js" rel="stylesheet"> -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">


  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="assets/MDB/css/style.css" rel="stylesheet">

</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 



<!-- Resent Cat-->
<section class="section-padding gray-bg">
<!-- G and buy section -->
  <div class="container">
    <div class="container">
      <!-- auto compare start -->
      <!--Carousel Wrapper-->
      <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <?php
            $sql = "SELECT * FROM `tblvehicles` 
              ORDER BY RegDate ASC";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            print_r($results);exit;

            for ($i = 0; $i < count($results) ; $i++) { 
              # code...
              if($i % 3 == 0 && $i != 0) {
                echo "</div>";
              }
              if($i % 3 == 0) {
                if($i == 0) {
                  echo "<div class='carousel-item active'>";
                } else {
                  echo "<div class='carousel-item'>";
                }
              }
              echo '<div class="col-md-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="admin/img/vehicleimages/'.$results[$i]->Vimage1 .'"  alt="Car Image" height="250px">
                  <div class="card-body">
                    <h4 class="card-title">'.$results[$i]->VehiclesTitle.'</h4>
                    <h4 class="card-title">'.$results[$i]->VehiclesBrand.'</h4>
                    <p class="card-text"></p>
                    <a class="btn btn-primary">'.$results[$i]->price.'  USD</a>
                  </div>
                </div>
              </div>';
            }
            if($i % 3 != 0) {
              echo '</div>';
            }
          ?>
         

        </div>
        <!--/.Slides-->
        <!--Controls-->
        <div class="controls-top" style="text-align: right;background-color: #4285f4;">
          <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
          <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
              class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->
      </div>
      <!--/.Carousel Wrapper-->
      <!-- auto compare end -->
    </div>
  </div>
</section>
<!-- /Resent Cat --> 

<!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
            <p>New Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
            <p>Used Cars For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
        <?php 
        $tid=1;
        $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':tid',$tid, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {  ?>
        <div class="testimonial-m">
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<!-- <script src="assets/js/bootstrap.min.js"></script>  -->
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
  <!-- <script type="text/javascript" src="assets/MDB/js/mdb.min.js"></script> -->
  <script>
  
  </script>
</html>