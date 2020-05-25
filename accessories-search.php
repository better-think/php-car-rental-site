<?php 
session_start();
error_reporting(0);

include('includes/config.php');

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
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 


  <script src="assets/MDB/js/jquery.min.js"></script>  
  <script src="assets/MDB/js/popper.min.js"></script>
  <script src="assets/MDB/js/bootstrap.min.js"></script>

  <script src="assets/MDB/js/bootstrap.js"></script>

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

  <!-- <link href="assets/MDB/material-select-view.min.js" rel="stylesheet"> -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">


  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="assets/MDB/css/style.css" rel="stylesheet">
  <link href="assets/css/ImitatiedWithW3.css" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/navbar.css" type="text/css">
  <style>
    .newPost {
      position: absolute;
      top: 8%;
      left: 0%;
      background-color: #4285f4a6;
      color: white;
      font-size: 16px;
      padding: 6px 30px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transform: rotate(-45deg);
    }
    figcaption.carousel-text {
      position: absolute;
      top: 90%;
      background-color: white;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      text-align: center;
    }
    figcaption.carousel-text span {
        color: red;
    }
    .rend-car-card{
      margin-bottom: 15px;
    }
  </style>

</head>
<body>

<!-- Start Switcher -->
<?php //include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 



<!-- Resent Cat-->
<section class="section-padding gray-bg">
<!-- G and buy section -->
<div class="container">
    <hr/>
    <div class="container">
      <!-- auto compare start -->
      <!-- <div class="row mt-4">
            <h2 class="font-weight-bold">avto ehtiyat (auto compare cars)</h2>
        </div> -->
        <div class="row">
            <h2 class="font-weight-bold">Müqayisə et</h2>
        </div>
      <!--Carousel Wrapper-->
      <div id="multi-item-example" class="carousel slide carousel-multi-item mt-4" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
          <?php
            $sql = "SELECT * FROM `tblvehicles` where type='sell'  ORDER BY RegDate ASC";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $year = date("Y");
            $month = date("m");
            $day = date("d");

            for ($i = 0; $i < count($results) ; $i++) {
              $result = $results[$i];
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
                  <a href="body_style_content.php?id='.$result->id.'">
                    <img class="card-img-top" src="admin/img/vehicleimages/'.$results[$i]->Vimage1 .'"  alt="Car Image" height="250px">
                  </a>
                  ';
              $regDate = explode(' ', $results[$i]->RegDate);
              $regDate = explode("-", $regDate[0]);
              if($year == $regDate[0] && $month == $regDate[1] && $regDate[2] > $day-7){
                echo  '<span class="newPost">new</span>';
              }    
              echo '    <div class="card-body">
                    <h4 class="card-title">'.$results[$i]->VehiclesTitle.'</h4>
                    <p class="card-text"></p>
                    <p>price:'.$results[$i]->price.'  USD</p>
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
        
      </div>
      <!--Controls-->
        <div class="controls-top" style="text-align: right;background-color: #4285f4;">
          <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
          <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
        </div>
        <!--/.Controls-->
      <!--/.Carousel Wrapper-->
      <!-- auto compare end -->
    </div>
 
</div>

</div>
</section>
<!-- /Resent Cat --> 
<!--Footer -->
<?php include('includes/fun-facts.php');?>
<!-- /Footer--> 
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

        $results = $query->fetchAll(PDO::FETCH_OBJ);
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
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
  <script type="text/javascript" src="assets/MDB/js/mdb.min.js"></script>
  <script type="text/javascript">
      // Material Select Initialization
      $(document).ready(function() {
      $('.mdb-select').materialSelect();
      $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
        $(this).closest('.select-outline').find('label').toggleClass('active');
        $(this).closest('.select-outline').find('.caret').toggleClass('active');
      });
      $('#year1').change(function() {
          $('#make1').removeAttr('disabled');
          $('#make1').materialSelect();
      });
      $('#make1').change(function(){
          $('#model1').removeAttr('disabled');
          $('#model1').materialSelect();
      });
      $('#model1').change(function(){
          $('#trim1').removeAttr('disabled');
          $('#trim1').materialSelect();
      });
      $('#trim1').change(function(){
          $('#p_year1').hide();
          $('#p_make1').hide();
          $('#p_model1').hide();
          $('#img1').removeClass('d-none');
          $('#compare_search1').removeClass('d-none');
          $('.cp1').removeClass('d-none');
          var carsticky = $('#compare_select').hasClass("sticky-top");
          if(!carsticky)
              $('#compare_select').addClass("sticky-top");
      });
      $('#year2').change(function(){
          $('#make2').removeAttr('disabled');
          $('#make2').materialSelect();
      });
      $('#make2').change(function(){
          $('#model2').removeAttr('disabled');
          $('#model2').materialSelect();
      });
      $('#model2').change(function(){
          $('#trim2').removeAttr('disabled');
          $('#trim2').materialSelect();
      });
      $('#trim2').change(function(){
          $('#p_year2').hide();
          $('#p_make2').hide();
          $('#p_model2').hide();
          $('#img2').removeClass('d-none');
          $('#compare_search2').removeClass('d-none');
          $('.cp2').removeClass('d-none');
            carsticky = $('#compare_select').hasClass("sticky-top");
          if(!carsticky)
              $('#compare_select').addClass("sticky-top");
      });
      $('#year3').change(function(){
          $('#make3').removeAttr('disabled');
          $('#make3').materialSelect();
      });
      $('#make3').change(function(){
          $('#model3').removeAttr('disabled');
          $('#model3').materialSelect();
      });
      $('#model3').change(function(){
          $('#trim3').removeAttr('disabled');
          $('#trim3').materialSelect();
      });
      $('#trim3').change(function(){
          $('#p_year3').hide();
          $('#p_make3').hide();
          $('#p_model3').hide();
          $('#img3').removeClass('d-none');
          $('#compare_search3').removeClass('d-none');
          $('.cp3').removeClass('d-none');
          carsticky = $('#compare_select').hasClass("sticky-top");
          if(!carsticky)
              $('#compare_select').addClass("sticky-top");
      });
      $('#accessories_more_btn').click(function(){
          $('#accessories_more_div').removeClass('d-none');
          $('#accessories_more_btn').addClass('d-none');

      });
      $('.view-list').click(function(){
          var status1 = $('#list_records').hasClass('list-view');
          if(!status1) {
              $('#list_records').addClass('list-view'); 
              $('#list_records').removeClass('grid-view'); 
              $('#list_records').removeClass('hero-view'); 
              $('.view-list').addClass('active'); 
              $('.view-grid').removeClass('active');
              $('.view-hero').removeClass('active');
          }
      });

      $('.view-grid').click(function(){
          var  status2 = $('#list_records').hasClass('grid-view');
          if(!status2) {
              $('#list_records').addClass('grid-view'); 
              $('#list_records').removeClass('list-view'); 
              $('#list_records').removeClass('hero-view'); 
              $('.view-list').removeClass('active'); 
              $('.view-grid').addClass('active');
              $('.view-hero').removeClass('active');
          }
      });
      $('.view-hero').click(function(){
          var status3 = $('#list_records').hasClass('hero-view');
          if(!status3) {
              $('#list_records').addClass('hero-view'); 
              $('#list_records').removeClass('list-view'); 
              $('#list_records').removeClass('grid-view'); 
              $('.view-list').removeClass('active'); 
              $('.view-grid').removeClass('active');
              $('.view-hero').addClass('active');
          }
      });
      $('#list_records_footer').click(function(){
        $('.list_record').removeClass('hidden');
      });
      
      $('#rent_car_more').click(function(){
          $('.rent-car').removeClass('hidden');
          $('#rent_car_more').addClass('hidden');
      });  
     
    });
  </script>
  <script src="assets/js/accessory-search.js"> </script> 
<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>