<?php 
session_start();
      
include('includes/config.php');
error_reporting(0);
{ 
echo $make;

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

<div class="container">
        <section>
            <div class="row">
                <h2 class="font-weight-bold">Avtomobil Elanları</h2>
            </div>
            <div class="p-2" id="list_records_header">
                <span class="h2">132,32 Articles</span>
                <div class="btn-group pull-right clearfix">
                    <button type="button" class="btn btn-ultralight btn-sm view-list "><i class="fas fa-list"></i></i></button>
                    <button type="button" class="btn btn-ultralight btn-sm view-grid active"><i class="fas fa-th-large"></i></button>
                    <button type="button" class="btn btn-ultralight btn-sm view-hero"><i class="far fa-square"></i></i></button>
                </div>
                
            </div>
            
            <?php 


                $make=$_GET['make'];
                $FuelType=$_GET['fueltype'];
                $ModelYear=$_GET['year'];
                $model=$_GET['model'];
                $priceup=$_GET['price_up'];
                $priceto=$_GET['price_to'];
                $gear_box=$_GET['transmission'];
                $mileage=$_GET['mileage'];
                $sql = "SELECT make,VehiclesTitle,VehiclesOverview,FuelType,ModelYear,model,gear_box,price,mileage,Vimage1,Vimage2,Vimage3,Vimage4 from tblvehicles WHERE make='$make' AND model='$model' AND FuelType='$FuelType' AND ModelYear=$ModelYear AND gear_box='$gear_box' AND mileage=$mileage AND price>=$priceup AND $priceto>= $price ";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0) 
                {
                    foreach($results as $result)
                    {  
                    ?> <br/><br/>
                    <div class="col-lg-12" style="height:260px">
             <div class="col-lg-12" style="height:100%">
                <div class="col-lg-4"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" style="width:400px"/></div>
                <div class="col-lg-4"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" style="width:33.4%;height:50px"/><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" style="width:33.3%;height:50px"/><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" style="width:33.3%;height:50px"/></div>
               
             </div>
             <div class="col-lg-7" style="margin-left:37%;height:100%;margin-top:-22%">
              <div class="col-lg-12">
                </div>
                <div class="card-body card-body-cascade text-center">
                                <!--Title-->
                                <h4 class="card-title"><strong>NAME : <?php echo htmlentities($result->VehiclesTitle);?></strong></h4>
                                <p class="card-text">
                                FUELTYPE : <?php echo htmlentities($result->FuelType);?><br/>YEAR : <?php echo htmlentities($result->ModelYear);?><br/>
                                  MAKE : <?php echo htmlentities($result->make);?><br/>PRICE : <?php echo htmlentities($result->price);?><br/>
                                  GEAR_BOX : <?php echo htmlentities($result->gear_box);?><br/> MILEAGE : <?php echo htmlentities($result->mileage);?><br/>
                                  MODEL : <?php echo htmlentities($result->model);?>
                                </p>
                </div>
              </div>
            </div>
            </div>
            <?php }} ?>
        </section><br/><br/><br/>
    </div>
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
<!-- <script type="text/javascript" src="assets/MDB/js/jquery-3.4.1.min.js"></script> -->
  <!-- Bootstrap tooltips -->
  <!-- <script type="text/javascript" src="assets/MDB/js/popper.min.js"></script> -->
  <!-- Bootstrap core JavaScript -->
  <!-- <script type="text/javascript" src="assets/MDB/js/bootstrap.min.js"></script> -->
  <!-- MDB core JavaScript -->
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
            $('#compare_search').removeClass('d-none');
            $('.cp1').removeClass('d-none');
            var carsticky = $('#compare_select').hasClass("sticky-top");
            if(!carsticky)
                $('#compare_select').addClass("sticky-top");
        });

        
        $('#close1').click(function(){
            $('#p_year1').show();
            $('#p_make1').show();
            $('#p_model1').show();
            $('#img1').addClass('d-none');
            $('.cp1').addClass('d-none');

            refresh_compare();
        });

        let refresh_compare = function() {
            let state = $("#img1").hasClass("d-none");
            state = state && $("#img2").hasClass("d-none");
            state = state && $("#img3").hasClass("d-none");

            if(state)
                $('#compare_search').addClass('d-none');
        }

        
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
            $('#compare_search').removeClass('d-none');
            $('.cp2').removeClass('d-none');
             carsticky = $('#compare_select').hasClass("sticky-top");
            if(!carsticky)
                $('#compare_select').addClass("sticky-top");
            
          
     
        });
        $('#close2').click(function(){
            $('#p_year2').show();
            $('#p_make2').show();
            $('#p_model2').show();
            $('#img2').addClass('d-none');
            $('.cp2').addClass('d-none');
            refresh_compare();
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
            $('#compare_search').removeClass('d-none');
            $('.cp3').removeClass('d-none');
            carsticky = $('#compare_select').hasClass("sticky-top");
            if(!carsticky)
                $('#compare_select').addClass("sticky-top");
            
          
     
        });
        $('#close3').click(function(){
            $('#p_year3').show();
            $('#p_make3').show();
            $('#p_model3').show();
            $('#img3').addClass('d-none');
            $('.cp3').addClass('d-none');
            refresh_compare();
        });
        $('#accessories_more_btn').click(function(){
            $('#accessories_more_div').removeClass('d-none');
            $('#accessories_more_btn').addClass('d-none');

        });
       
        $('.accesorries').carousel({
        interval: 0,
        touch: true,
        pause:'hover',
        });
        $('.view-list').click(function(){
            var status1 = $('#list_records').hasClass('list-view');
            if(!status1)
                {

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
            if(!status2)
                {

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
            if(!status3)
                {

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

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>
<?php } ?>