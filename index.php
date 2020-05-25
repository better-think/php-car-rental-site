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
  <link href="assets/css/accessory-search.css" rel="stylesheet"></link>

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
    <div class="container">

        <div class="row">
            <!--Carousel Wrapper-->
            <div class="col-xl-6">
                <div id="carousel-news" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-2" data-slide-to="1"></li>
                        <li data-target="#carousel-example-2" data-slide-to="2"></li>
                        <li data-target="#carousel-example-2" data-slide-to="3"></li>
                        <li data-target="#carousel-example-2" data-slide-to="4"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <!-- <div> -->
                      <div class="carousel-inner" role="listbox" style="height: 500px;">
                      <?php
                        $sql ="SELECT * FROM `tblvehicles` ORDER BY RegDate and UpdationDate ASC LIMIT 5;";
                        $query= $dbh -> prepare($sql);
                        $query-> bindParam(':email', $email, PDO::PARAM_STR);
                        $query-> bindParam(':password', $password, PDO::PARAM_STR);
                        $query-> execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        if(count($results) > 0) {
                          for ($i = 0; $i <count( $results); $i++) {
                            $result = $results[$i];
                            $regDate = explode(' ', $result->RegDate);
                            $regDate = explode("-", $regDate[0]);
                            if($i == 0) {
                              echo '<div class="carousel-item active">';
                            } else {
                              echo '<div class="carousel-item">';
                            }
                            echo "<div class='view'>
                                    <img class='d-block w-100' src='admin/img/vehicleimages/$result->Vimage1' alt='First slide' height='350px'>
                                    <div class='mask rgba-black-light'></div>
                                </div>
                                <figcaption class='carousel-text overlay'>
                                  <span> $regDate[1] $regDate[2], $regDate[0] </span>
                                  <h3 class='h3-responsive'> new $result->VehiclesTitle, it has $result->horse_power Ph, $result->mileage mile</h3>
                                  <p></p>
                                </figcaption>
                            </div>";
                          }
                        }
                      ?>
                      <!-- </div> -->
                    </div>
                    <!--/.Slides-->
                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#carousel-news" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-news" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
            <div class="col-xl-6">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel555" role="tab">
                            <i class="fas fa-user pr-2"></i>AL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sell.php" role="tab">
                            <i class="fas fa-heart pr-2"></i>SAT</a>
                    </li>
                </ul>
                <!-- Nav tabs -->

                <!-- Tab panels -->
                <div class="tab-content">
                  <!-- Panel 1 -->
                  <div class="tab-pane fade in show active" id="panel555" role="tabpanel">
                      <!-- Nav tabs -->
                      <div class="row">
                      <form action="search-car.php" method="post">
                        <div class="form-row">
                          <div class="col-xl-12 badge">
                              <ul class="nav md-pills nav-justified pills-info">
                                  <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#panel85" role="tab"><img src="assets/MDB/img/svg/car.svg"> </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#panel86" role="tab"><img src="assets/MDB/img/svg/autobye.svg"> </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#panel87" role="tab"><img src="assets/MDB/img/svg/bus.svg"> </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#panel88" role="tab"><img src="assets/MDB/img/svg/truck.svg"> </a>
                                  </li>
                              </ul>

                          </div>
                          <!-- make   -->
                          <div class="col-xl-6">
                          
                              <p class="text-dark text-center font-weight-bold mt-4">Marka(Make)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="make" name="make" required>
                                <option value=""> Select </option>
                                <?php $ret="SELECT id, NAME FROM tblmake ORDER BY NAME ASC;";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->NAME);?>"><?php echo htmlentities($result->NAME);?></option>
                                <?php }} ?>

                              </select>

                          </div>
                          <!-- model -->
                          <div class="col-xl-6">

                              <p class="text-dark text-center font-weight-bold mt-4">Model(Model)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="model" name="model" required>
                                <option value=""> Select </option>
                                <?php $ret="select id, name from tblmodel";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
                                <?php }} ?>

                              </select>

                          </div>
                          <!-- price -->
                          <div class="col-lg-6">
                            <p class="text-dark text-center font-weight-bold">AZN-dən(Price up)</p>
                            <div class="col-lg-12">
                              <input type="text" id="price_to" name="price_to" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <p class="text-dark text-center font-weight-bold">AZN-dek(Price to)</p>
                            <div class="col-lg-12">
                              <input type="text" id="price_up" name="price_up" class="form-control" required>
                            </div>
                          </div>
                          <!-- year -->
                          <div class="col-lg-6">
                              <p class="text-dark text-center font-weight-bold">İl-dən(year)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="year" name="year" required>
                                <option value=""> Select </option>
                                <?php $ret="select id, year from tblyear order by year DESC;";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->year);?>"><?php echo htmlentities($result->year);?></option>
                                <?php }} ?>

                              </select>

                          </div>
                          <!-- Fuel type -->
                          <div class="col-xl-6">
                              <p class="text-dark text-center font-weight-bold">Yanacaq növü(fuel type)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="fueltype" name="FuelType" required>
                                <option value=""> Select </option>
                                <?php $ret="select id, type from tblfuel_type";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->type);?>"><?php echo htmlentities($result->type);?></option>
                                <?php }} ?>

                              </select>

                          </div>
                          <!-- Gearbox -->
                          <div class="col-xl-6">
                              <p class="text-dark text-center font-weight-bold">Sürət qutusu(Gearbox)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="transmission" name="transmission" required>
                                <option value=""> Select </option>
                                <?php $ret="select id, name from tblgear_box";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->name);?>"><?php echo htmlentities($result->name);?></option>
                                <?php }} ?>

                              </select>

                          </div>

                          <!-- Mileage -->
                          <div class="col-xl-6">
                              <p class="text-dark text-center font-weight-bold">Kilometraj(Mileage)</p>
                              <select class="mdb-select md-form mt-0 mb-0" id="mileage" name="mileage" required>
                                <option value=""> Select </option>
                                <?php $ret="select id,mileage from tblvehicles";
                                $query= $dbh -> prepare($ret);
                                $query-> execute();
                                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                if($query -> rowCount() > 0)
                                {
                                foreach($results as $result)
                                {
                                ?>
                                <option value="<?php echo htmlentities($result->mileage);?>"><?php echo htmlentities($result->mileage);?></option>
                                <?php }} ?>

                              </select>

                          </div>
                          <div class="col-xl-12" style="text-align: center;">
                            <button type="submit" name="submit" class="btn purple-gradient">Axtar(search)</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- Panel 1 -->
                </div>
              </div>
          </div>
      </div>
    </div>
    <hr/>
    <hr/>

    <!-- compare section-->
    <div class="container">
        <div class="row">
            <h2 class="font-weight-bold">Maşın Müqayisə et(Car Compare)</h2>
        </div>
        <div class="row" id="compare_select" style="background-color: #fff;">
            <div class="col-xl-4 px-3 py-5">
                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_year1">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="year1" name = "ngs" onchange="getYears('year1','make1');">
                            <option value="" disabled selected>Year</option>
                            <?php
                            $sql="SELECT * FROM `tblyear`";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            if(count($results) > 0){
                              $i = 0;
                              foreach($results as $result){
                                $i++;
                                ?>
                                <option name="<?php echo htmlentities($result->year);?>"><?php echo htmlentities($result->year);?></option>
                                <?php
                              }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_make1">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success " id="make1" disabled onchange="getMakes( 'year1','make1','model1');">
                          <option value="Make" disabled selected>Make</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_model1">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="model1" disabled onchange="getModels('year1','make1','model1','trim1');">
                            <option value="" disabled selected>Model</option>
                        </select>
                    </div>
                </div>

                <div class="row d-none" id="img1">
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline container" id="p_trim1">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="trim1" disabled onchange="getTrims('year1','make1','model1','trim1','img1','compare_search1');">
                            <option value="" disabled selected>Trim</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 px-3 py-5">
                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_year2">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="year2" onchange="getYears('year2','make2');">
                            <option value="" disabled selected>Year</option>
                            <?php
                            $sql="SELECT * FROM `tblyear`";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            if(count($results) > 0){
                              $i = 0;
                              foreach($results as $result){
                                $i++;
                                ?>
                                <option id="yearoption2" name="<?php echo htmlentities($result->year);?>"><?php echo htmlentities($result->year);?></option>
                                <?php
                              }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_make2">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success " id="make2" disabled onchange="getMakes('year2','make2','model2');">
                            <option value="" disabled selected>Make</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_model2">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="model2"disabled onchange="getModels('year2','make2','model2','trim2');">
                            <option value="" disabled selected>Model</option>
                        </select>
                    </div>
                </div>

                <div class="row d-none" id="img2">
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_trim2">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="trim2" disabled onchange="getTrims('year2','make2','model2','trim2','img2','compare_search2');">
                            <option value="" disabled selected>Trim</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 px-3 py-5">
                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_year3">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="year3" onchange="getYears('year3','make3');">
                            <option value="" disabled selected>Year</option>
                            <?php
                            $sql="SELECT * FROM `tblyear`";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                            if(count($results) > 0){
                              $i = 0;
                              foreach($results as $result){
                                $i++;
                                ?>
                                <option id="yearoption3" name="<?php echo htmlentities($result->year);?>"><?php echo htmlentities($result->year);?></option>
                                <?php
                              }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_make3">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success " id="make3" disabled onchange="getMakes('year3','make3','model3');">
                            <option value="" disabled selected>Make</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_model3">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="model3" disabled onchange="getModels('year3','make3','model3','trim3');">
                            <option value="" disabled selected>Model</option>
                        </select>
                    </div>
                </div>

                <div class="row d-none" id="img3">
                </div>

                <div class="row">
                    <div class="col-xl-12 select-outline" id="p_trim3">
                        <select class="mdb-select md-form md-outline colorful-select dropdown-success" id="trim3" disabled onchange="getTrims('year3','make3','model3','trim3','img3','compare_search3');">
                            <option value="" disabled selected>Trim</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- search result -->
        <div class="container">
          <div  class="row mt-4">
            <div  class="col-xl-4 px-3 py-20 mt-4">
              <div class="row d-none" id="compare_search1">
              </div>
            </div>
            <div  class="col-xl-4 px-3 py-20 mt-4">
              <div class="row d-none" id="compare_search2">
              </div>
            </div>
            <div  class="col-xl-4 px-3 py-20 mt-4">
              <div class="row d-none" id="compare_search3">
              </div>
            </div>
          </div>
        </div>
    </div>
    <hr/>
    <!-- accessory search -->
    <div class="row">
      <div class="col-11 col-xl-11" style="margin-left: 5%;">
        <div class="row">
          <h2 class="font-weight-bold">Aksesuarları axtarın(Search Accesories)</h2>
        </div>
        <!-- Classic tabs -->
        <div class="classic-tabs">

          <!-- Nav tabs -->
          <div class="tabs-wrapper">
              <ul class="nav tabs-primary" role="tablist">
                  <li class="nav-item active" id="navli">
                    <a id="accessory-year" class="nav-link waves-light waves-effect waves-light active" data-toggle="tab" href="#panel83" role="tab">
                        <!-- <i class="fas fa-heart fa-2x" aria-hidden="true"></i> -->
                        <br><h2 class="white-text"> YEAR</h2>
                    </a>
                  </li>
                  <li class="nav-item" id="navli">
                    <a id="accessory-make" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel84" role="tab">
                        <!-- <i class="fas fa-heart fa-2x" aria-hidden="true"></i> -->
                        <br><h2 class="white-text"> MAKE</h2>
                    </a>
                  </li>
                  <li class="nav-item" id="navli">
                    <a id="accessory-model" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel85" role="tab" aria-selected="false">
                        <!-- <i class="fas fa-envelope fa-2x" aria-hidden="true"></i> -->
                        <br><h2 class="white-text"> MODEL</h2>
                    </a>
                  </li>
                  <li class="nav-item" id="navli">
                    <a id="accessory-trim" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel86" role="tab" aria-selected="true">
                        <!-- <i class="fas fa-star fa-2x" aria-hidden="true"></i> -->
                        <br><h2 class="white-text"> TRIM</h2>
                    </a>
                  </li>
              </ul>
          </div>
          <!-- Tab panels -->
          <div class="tab-content card">
              <!--Panel 1-->
              <div class="tab-pane fade active show" id="panel83" role="tabpanel">
                  <?php
                    $sql="SELECT * FROM `tblyear`";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query -> fetchAll(PDO::FETCH_OBJ);
                    if(count($results) > 0){
                      $i = 0;
                      foreach($results as $result){
                        $i++;
                        ?>
                        <button class="btn btn-outline-info waves-effect" onclick="getMakeForAccesories(<?php echo htmlentities($result->id);?>)"><?php echo htmlentities($result->year);?></button>
                        <?php
                      }
                    }
                  ?>
              </div>
              <!--/.Panel 1-->
              <!--Panel 2-->
              <div class="tab-pane fade" id="panel84" role="tabpanel">
              </div>
              <!--/.Panel 2-->
              <!--Panel 3-->
              <div class="tab-pane fade" id="panel85" role="tabpanel">
              </div>
              <!--/.Panel 3-->
              <!--Panel 4-->
              <div class="tab-pane fade" id="panel86" role="tabpanel">
                  
              </div>
              <!--/.Panel 4-->
          </div>
        </div>
        <!-- Classic tabs -->
      </div>
    </div>

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
    <!-- Accessories section -->
    <div class="container">
        <!-- connect database -->
        <?php 
                echo "<div class='row justify-content-md-center py-3'>";

                $sql = "SELECT * FROM `tblaccessories` ORDER BY RegDate ASC";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 0;
                if($query->rowCount() > 0) 
                {
                  foreach($results as $result)
                  { 
                    if($cnt  > 2 && $cnt % 5 == 0) {
                      // echo "</div>";
                    }
                    if($cnt % 5 == 0) {
                      // echo "<div class='row justify-content-md-center py-3'>";
                    }
                    if($cnt == 18) {
                      break;
                    }
                  ?>
                          <div class="col col-xl-2 col-lg-3 col-md-4 col-6 accessories-margin-top-5">
                              <!--Card Regular-->
                              <div class="card card-cascade">
                                  <!--Card image-->
                                  <div class="view view-cascade overlay zoom">
                                    
                                      <div id="carouselExampleFade<?php echo htmlentities($cnt); ?>" class="carousel slide accesorries carousel-fade" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="admin/img/accessories/<?php echo htmlentities($result->Accessorieimage);?>"
                                              alt="First slide">
                                            <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                                              <div class="mask rgba-white-slight"></div>
                                            </a>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100" src="admin/img/accessories/<?php echo htmlentities($result->Accessorieimage);?>"
                                              alt="Second slide">
                                            <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                                              <div class="mask rgba-white-slight"></div>
                                            </a>
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100" src="admin/img/accessories/<?php echo htmlentities($result->Accessorieimage);?>"
                                              alt="Third slide">
                                            <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                                              <div class="mask rgba-white-slight"></div>
                                            </a>
                                          </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleFade1" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleFade1" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                                  </div>
                                  <!--/.Card image-->

                                  <!--Card content-->
                                  <div class="card-body card-body-cascade text-center">
                                      <!--Title-->
                                      <h4 class="card-title"><strong><?php echo htmlentities($result->AccessoriesTitle);?></strong></h4>
                                    

                                      <p class="card-text">
                                      <?php echo htmlentities($result->AccessoriesOverview);?>
                                      </p>
                                  </div>
                              </div>
                          </div>
                  <?php 
                    $cnt++;
                  }
                  if($cnt % 5 != 0) {
                    echo "</div>";
                  }
                  echo '<div class="row justify-content-md-center py-12">
                            <button type="button" id="accessories_more_btn" class="btn btn-primary">Daha çox göstər..... </button>
                        </div>';
                  echo '<div class="container d-none" id="accessories_more_div">';
                  $i = 0;
                  echo '<div class="row justify-content-md-center py-3">';
                  for ($i=18; $i < count($results); $i++) { 
                    # code...
                    $result = $results[$i];
                    if($i > 15 && $i % 5 == 0) {
                      // echo '</div>';
                    }
                    if($i % 5 == 0) {
                      // echo '<div class="row justify-content-md-center py-3">';
                    }
                    echo '<div class="col col-xl-2 accessories-margin-top-5">
                        <!--Card Regular-->
                        <div class="card card-cascade">

                            <!--Card image-->
                            <div class="view view-cascade overlay zoom">
                              
                                <div id="carouselExampleFade31" class="carousel slide accesorries carousel-fade" data-ride="carousel">
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="admin/img/accessories/' . $result->Accessorieimage . '"
                                        alt="First slide">
                                      <a href="body_style_content.php?id='.$result->id.'">
                                        <div class="mask rgba-white-slight"></div>
                                      </a>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="admin/img/accessories/' . $result->Accessorieimage . '"
                                        alt="Second slide">
                                      <a href="body_style_content.php?id='.$result->id.'">
                                        <div class="mask rgba-white-slight"></div>
                                      </a>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="admin/img/accessories/' . $result->Accessorieimage . '"
                                        alt="Third slide">
                                      <a href="body_style_content.php?id='.$result->id.'">
                                        <div class="mask rgba-white-slight"></div>
                                      </a>
                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleFade31" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleFade31" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body card-body-cascade text-center">
                                <!--Title-->
                                <h4 class="card-title"><strong>'. $result->AccessoriesTitle.'</strong></h4>
                                <p class="card-text">
                                  '. $result->AccessoriesOverview.'
                                </p>
                            </div>
                        </div>
                    </div>';



                  }
                  echo '</div>';
                  
                } ?>
    </div>
<!-----------------------  sales section--------------->
    <div class="container">
        <section>
            <div class="row">
                <h2 class="font-weight-bold">Avtomobil Elanları</h2>
            </div>
            <div class="p-2" id="list_records_header">
                <!-- <span class="h2">132,32 Articles</span> -->
                <div class="btn-group pull-right clearfix">
                    <button type="button" class="btn btn-ultralight btn-sm view-list "><i class="fas fa-list"></i></i></button>
                    <button type="button" class="btn btn-ultralight btn-sm view-grid active"><i class="fas fa-th-large"></i></button>
                    <button type="button" class="btn btn-ultralight btn-sm view-hero"><i class="far fa-square"></i></i></button>
                </div>
            </div>
            <div id="list_records" class="item post grid-view" >
              <?php 
                $sql = "SELECT *
                  from tblvehicles  WHERE type='buy'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0) 
                {
                  foreach($results as $result)
                  {  
                  ?> 
                  <div class="list_record">
                    <div class="record_body">
                      <div class="record_details clearfix">
                          <!--Card image-->
                        <div class="record_image_wrapper">
                          <a class="thumb record_image " href="body_style_content.php?id=<?php echo htmlentities($result->id);?>" >
                            <img class="d-block w-100"  src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"  alt="Third slide" height="180px">
                          </a>
                        </div>
                        <div class="record_image_wrapper hero">
                          <a class="record_image" href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                            <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                              alt="Third slide">
                          </a>
                        </div>
                        <h6 class="record-heading">
                            <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                                <span><?php echo htmlentities($result->VehiclesTitle);?>:<?php echo htmlentities($result->ModelYear);?> 
                                  Datsum <?php echo htmlentities($result->price_up);?> Pickup
                                </span>
                            </a>
                        </h6>
                        <div class="description">
                            <p></p>
                        </div>
                        <div class="blogger-name">
                            <a href="#">
                                <!-- <span class="fn text-color-black">Murilee martin</span> -->
                            </a>
                        </div>
                          <!--/.Card image-->
                          <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                          <!--Title-->
                          <h4 class="card-title"><strong><?php echo htmlentities($result->price);?> AZN</strong></h4>
                          <p class="card-text">
                            <?php echo htmlentities($result->VehiclesTitle);?>:<?php echo htmlentities($result->VehiclesOverview);?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php 
                  }
                } ?>
            </div>
            <div id="list_records_footer" class="col-xl-12 text-center">
               <button class="btn btn-primary waves-effect waves-light" data-rapid_p="243" data-v9y="1">Daha çox götər... </button>
            </div>
        </section>
    </div>
    <!--------------rental car----------------->
    <div class="container ">
        <section>
            <div class="row">
                <h2 class="font-weight-bold">İcarə Avtomobil</h2>
            </div>
            <div id="" class="row" data-ride="">

            <!--Controls-->
            <!-- Card group -->
            <?php 
                $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName, 
                    tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,
                    tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,
                    tblvehicles.Vimage1, tblvehicles.model, tblvehicles.price, 
                    tblvehicles.gear_box ,tblvehicles.rental_period
                  from tblvehicles 
                  join tblbrands 
                  on tblbrands.id=tblvehicles.VehiclesBrand 
                  WHERE type='lend'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cardCount = 0;
                $i=0;
                if($query->rowCount() > 0) 
                {
                  for ($i=0; $i < count($results); $i++) { 
                    $result = $results[$i];
                    // if($i > 2 && $i % 4 == 0) {
                    //   echo '</div>';
                    // }
                    echo "<div class='col-md-6 col-xl-3 col-lg-4 col-sm-12'>";

                    // if($i % 4 == 0) {
                    //   echo '<div class="card-group">';
                    // }
                    echo '<div class="card rend-car-card">
                      <div class="view overlay zoom">
                        <img class="card-img-top" src="admin/img/vehicleimages/' . $result->Vimage1. '"
                          alt="Card image cap" height="150px">
                        <a href="body_style_content.php?id='.$result->id.'">
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>

                      <div class="card-body text-center">
                        <h4 class="card-title">from '. $result->PricePerDay. 'per day</h4>
                        <p class="card-text">rental period of ' . $result->rental_period. 'days</p>
                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                        <button type="button" class="btn btn-primary btn-md">Read more</button>
                      </div>
                    </div>';
                    echo "</div>";
                  }
                } ?>
            
        </section>
    </div>
    <!------------- reviews section--------------->
    <div class="container bg-royalblue">
        <div class="row py-3">
                <div class="col-xl-12 text-left text-bold">
                    <div style="width: 100%; height: 20px; border-bottom: 1px solid white; text-align: center">
                         <span class="text-uppercase article__title" 
                         style="font-size: 25px;font-weight: bold;background-color: #ffffff; padding: 0 10px;">
                            Önə çıxan xəbərlər (Review)
                          </span>
                    </div>
                </div>
        </div>
      <div class="row">
      <?php 
        $sql ="SELECT * FROM `tblreview` ORDER BY RegDate AND UpdationDate";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) {
          foreach ($results as $key => $result) {
            echo '<div class="col-lg-4 col-md-6">
              <div class=" card-cascade narrower pt-5 pb-1">
                <div class="view view-cascade overlay">
                  <img src="admin/img/review/'. $result->ReviewImage .'" class="card-img" alt="narrower" height="220px">
                  <a>
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <div class="card-body card-body-cascade text-center">
                  <a href="#"><h4 class="text-black">'.$result->ReviewTitle . " " . $result->RegDate. '</h4></a>
                  <!-- <p class="card-text text-black">5</p> --->
                </div>
              </div>
            </div>';
          }
        }
      ?>
      </div>
    </div>
    <!--   ----------   body style----------------------->
    <div class="container">
        <div class="row py-3">
          <div class="col-xl-12 text-left text-bold">
              <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                    <span class="text-uppercase article__title" style="font-size: 25px;font-weight: bold;color: black;background-color: white;  padding: 0 10px;">
                      Kateqoryaya Görə Axtar
                    </span>
              </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName, 
                tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,
                tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,
                tblvehicles.Vimage1, tblvehicles.model, tblvehicles.price_up, tblvehicles.price_to, 
                tblvehicles.gear_box 
              from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand WHERE body_style='white'";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0) 
              {
                foreach($results as $result)
                {  
                  ?>
                  <div class="col-lg-3 col-md-6">

                    <div class=" card-cascade narrower pt-5 pb-1">
                      <div class="view view-cascade overlay">
                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="card-img"
                          alt="narrower" >
                        <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body card-body-cascade text-center">
                        <a href="body_style_content.php?id=<?php echo htmlentities($result->id);?>"><h5><?php echo htmlentities($result->VehiclesTitle);?></h5></a>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }
            ?>
        </div>
        <div class="row">
          <?php
            $sql ="SELECT * FROM `tblbody_style` ORDER BY NAME;";
            $query= $dbh -> prepare($sql);
            $query-> execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if(count($results) > 0) {
              for ($i = 0; $i <count( $results); $i++) {
                $result = $results[$i];
                echo '<div class="col-lg-3 col-md-6">
                  <div class=" card-cascade narrower pt-5 pb-1">
                    <div class="view view-cascade overlay">
                      <img src="admin/img/bodystyleimages/'.$result->filename.'" class="card-img"
                        alt="narrower">
                      <a href="body_style.php?bodystyle='.$result->name.'">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
                    <div class="card-body card-body-cascade text-center">
                      <a href="body_style.php?bodystyle='.$result->name.'"><h5>'.$result->name.'</h5></a>
                    </div>
                  </div>
                </div>';
              }
            }
          ?>
        </div>
    </div>

    <!--------  Popular model--------->
    <div class="container">
        <div class="row py-3">
                <div class="col-xl-12 text-left text-bold">
                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                         <span class="text-uppercase article__title" style="font-size: 25px;font-weight: bold;color: black;background-color: white;  padding: 0 10px;">
                            Popular Modellər
                          </span>
                    </div>
                </div>
        </div>
        <?php 
          $sql = "SELECT  name, file_name FROM `tblbrands` ORDER BY NAME ASC";
          $query= $dbh->prepare($sql);
          $query-> execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 0;
          if($query->rowCount() > 0) {
            foreach ($results as $result) {
              # code...
              if($cnt % 5 == 0) echo '<div class="row justify-content-md-center" style="justify-content: space-between !important;">';
              '<div class="row justify-content-md-center" style="justify-content: space-between !important;">';
              
              echo '<div class="col-2 col-xl-2 col-lg-2 col-md-6 col-sm-12 p-3">
                  <a href="search-model.php?name='. $result->name .'">
                      <div class="d-flex flex-row">
                          <div class="p-2">
                            <img style="width: 100px;" src="admin/img/make/'.$result->file_name.'">
                          </div>
                          <div class="d-flex flex-row">
                            <h5 style="line-height: 5em;
                            text-overflow: ellipsis;
                            overflow: hidden;
                            white-space: nowrap;">'.$result->name.'</h5>
                          </div>
                      </div>
                  </a>
              </div>';
              $cnt++;
              if($cnt > 1 && $cnt % 5 == 0) echo '</div>';
            }
            echo '</div>';
          }
        ?>
        
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
      
      function getYears (id, makeId) {
        var selectedYear = $('#' + id)[0].value;
        $.ajax({
          method: "post",
          url: "model.php",
          data: "action=getYear&year=" + selectedYear,
          success : function (makes) {
            makes = JSON.parse(makes);
            for(var i = 0;i<makes.length;i++){
              for(var j = i+1;j<makes.length;j++){
                if(makes[i].make !="" && makes[i].make == makes[j].make){
                  makes[i].make = "";
                }
              }
            }
            var strHtml = "<option value='' disabled selected>Make</option>";
            makes.forEach(make => {
              if(make.make != ""){
                strHtml += "<option value='"+ make.make +"'>" + make.make + "</option>";
              }
            });
            $('#' + makeId)[0].innerHTML = strHtml;
            initMaterialSelect(makeId);
          },
          error: function (err) {

          }
        })
      }
      function getMakes (yearId, id, modelId) {
        var selectedMake = $('#' + id)[0].value;
        var selectedYear = $('#' + yearId)[0].value;
        $.ajax({
          method: "post",
          url: "model.php",
          data: "action=getMake&make=" + selectedMake + "&year=" + selectedYear,
          success : function (models) {
            models = JSON.parse(models);
            for(var i = 0;i<models.length;i++){
              for(var j = i+1;j<models.length;j++){
                if(models[i].model !="" && models[i].model == models[j].model){
                  models[i].model = "";
                }
              }
            }
            var strHtml = "";
            strHtml += "<option value='' disabled selected>Model</option>";
            models.forEach(model => {
              if(model.model != ""){
                strHtml += "<option value='"+ model.model +"'>" + model.model + "</option>";
              }
            });
            $('#' + modelId)[0].innerHTML = strHtml;
            initMaterialSelect(modelId);
          },
          error: function (err) {

          }
        })
      }
      function getModels (yearId,makeId,id,trimId) {
        $('#' + id).value;
        var selectedYear = $('#' + yearId)[0].value;
        var selectedMake = $('#' + makeId)[0].value;
        var selectedModel = $('#' + id)[0].value;
        $.ajax({
          method: "post",
          url: "model.php",
          data: "action=getModel&make=" + selectedMake + "&year=" + selectedYear + "&model=" + selectedModel,
          success : function (trims) {
            trims = JSON.parse(trims);
            for(var i = 0;i<trims.length;i++){
              for(var j = i+1;j<trims.length;j++){
                if(trims[i].VehiclesTitle !="" && trims[i].VehiclesTitle == trims[j].VehiclesTitle){
                  trims[i].VehiclesTitle = "";
                }
              }
            }
            var strHtml = "";
            strHtml += "<option value='' disabled selected>Trim</option>";
            trims.forEach(trim => {
              if(trim.VehiclesTitle != ""){
                strHtml += "<option value='"+ trim.id +"'>" + trim.VehiclesTitle + "</option>";
              }
            });
            $('#' + trimId)[0].innerHTML = strHtml;
            initMaterialSelect(trimId);
          },
          error: function (err) {

          }
        })
      }
      function getTrims (yearId,makeId,modelId,id,pictureId,contentId) {
        $('#' + id).value;
        var selectedYear = $('#' + yearId)[0].value;
        var selectedMake = $('#' + makeId)[0].value;
        var selectedModel = $('#' + modelId)[0].value;
        var selectedTrim = $('#' + id)[0].value;
        var number;
        if(pictureId == 'img1')
          number = 1;
        else if(pictureId == 'img2')
          number = 2;
        else number = 3;
        $.ajax({
          method: "post",
          url: "model.php",
          data: "action=getTrim&make=" + selectedMake + "&year=" + selectedYear +
                "&model=" + selectedModel + "&trim=" + selectedTrim,
          success : function (items) {
            items = JSON.parse(items);
            var strHtml = "";
            var contentHtml1 = "";
            var contentHtml2 = "";
            var contentHtml3 = "";
            items.forEach(item => {
              if(item != ""){
                strHtml += '<div class="col-xl-12 text-right" id="close' + number +'">' +
                                '<i class="fas fa-times"></i>' +
                            '</div>' +
                            '<div class="col-xl-12 text-center">' +
                                '<img class="w-75" src="admin/img/vehicleimages/' +
                                  item.Vimage1 +
                                '">' +
                                '<div>'+item.ModelYear+"&nbsp;" + item.make + "&nbsp;&nbsp;&nbsp;"+ item.brand + "&nbsp;&nbsp;&nbsp;"+'</div>' +
                            '</div>';
                contentHtml =  '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                      '<h3 class="font-weight-bold">Ortalama Qiymət(Avarage Price)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.average_price + ' AZN' +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Mator Gücü(Engine power)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.engine_power +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">At Gücü(Horse power)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.horse_power +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Yanacaq növü(Fuel Type)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.FuelType +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Sürət Qutusu(Gear box)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.transmission +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Maksimal Surət(Top speed)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.top_speed + ' km/saat' +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Yanacaq Sərfiyyatı(Fuel consumption)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.fuel_consumption + ' litr(liter)' +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Yanacaq çəninin həcmi(Fuel tank capacity)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.fuel_tank_capacity + ' litr(liter)' +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Kondisioner(Conditioner(Clima))</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.Conditioners +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Hava yastığı(Airbag)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.air_bag +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+ 
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Oturacaqların isdidilməsi(Seat clima)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.seat_heating +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-xl-12">'+
                                        '<h3 class="font-weight-bold">Park sensoru(Parking Sensor)</h3>'+
                                    '</div>'+
                                    '<div class="col-xl-8  px-3 py-3  text-center">'+
                                        '<div class="px-3 py-3">'+
                                            '<div class="bg-light py-3 font-weight-bold">'+
                                              item.parking_sensor +
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
              }
            });
            $('#' + contentId)[0].innerHTML = contentHtml;
            $('#' + pictureId)[0].innerHTML = strHtml;
            $('#close1').click(function(){
              $('#p_year1').show();
              $('#p_make1').show();
              $('#p_model1').show();
              $('#img1').addClass('d-none');
              $('#compare_search1').addClass('d-none');
              $('.cp1').addClass('d-none');
              // refresh_compare();
            });
            let refresh_compare = function() {
                let state = $("#img1").hasClass("d-none");
                state = state && $("#img2").hasClass("d-none");
                state = state && $("#img3").hasClass("d-none");
                if(state)
                    $('#compare_search').addClass('d-none');
            }
            $('#close2').click(function(){
                $('#p_year2').show();
                $('#p_make2').show();
                $('#p_model2').show();
                $('#img2').addClass('d-none');
                $('#compare_search2').addClass('d-none');
                $('.cp2').addClass('d-none');
                // refresh_compare();
            });
            $('#close3').click(function(){
                $('#p_year3').show();
                $('#p_make3').show();
                $('#p_model3').show();
                $('#img3').addClass('d-none');
                $('#compare_search3').addClass('d-none');
                $('.cp3').addClass('d-none');
                // refresh_compare();
            });
          },
          error: function (err) {

          }
        })
      }
      function initMaterialSelect(id) {
        $(`#${id}`+'.mdb-select').materialSelect();
      }
      function search() {
        return false;
        var data = "action=search&make=" + $("#make")[0].value 
          + "&model=" +  $("#model")[0].value +  "&price_up=" + $("#price_up")[0].value 
          +  "&price_to=" + $("#price_to")[0].value + "&year=" + + $("#year")[0].value
          +  "&fueltype=" + $("#fueltype")[0].value + "&transmission=" + $("#transmission")[0].value
          +  "&mileage=" + $("#mileage")[0].value;
        $.ajax({
          method: "post",
          url: "assets/php/search.php",
          data: data,
          success : function (vehicles) {
            vehicles = JSON.parse(vehicles);
            var strHtml = "";
            vehicles.map(function(index, vehicle){
              strHtml += `<div class="list_record">
                  <div class="record_body">
                    <div class="record_details clearfix">
                        <!--Card image-->
                      <div class="record_image_wrapper">
                        <a class="thumb record_image" href="body_style_content.php?id=${vehicle.id}">
                          <img class="d-block w-100"  src="admin/img/vehicleimages/${vehicle.Vimage1}"  alt="Third slide" height="180px">
                        </a>
                      </div>
                      <div class="record_image_wrapper hero">
                        <a class="record_image" href="body_style_content.php?id=${vehicle.id}">
                          <img class="d-block w-100" src="admin/img/vehicleimages/${vehicle.Vimage1}"
                            alt="Third slide">
                        </a>
                      </div>
                      <h6 class="record-heading">
                          <a href="body_style_content.php?id=${vehicle.id}">
                              <span>${vehicle.VehiclesTitle} ${vehicle.ModelYear}
                              ${vehicle.price_up} Pickup
                              </span>
                          </a>
                      </h6>
                      <div class="description">
                          <p></p>
                      </div>
                      <div class="blogger-name">
                          <a href="#">
                              <!-- <span class="fn text-color-black">Murilee martin</span> -->
                          </a>
                      </div>
                      <div class="card-body card-body-cascade text-center">
                        <h4 class="card-title"><strong>${vehicle.price}> AZN</strong></h4>
                        <p class="card-text">
                        ${vehicle.VehiclesTitle}:${vehicle.VehiclesOverview}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>`;
            });
            $("#search-result-list").html(strHtml);
          }
        });
      }
  </script>
  <script src="assets/js/accessory-search.js"> </script> 
<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>