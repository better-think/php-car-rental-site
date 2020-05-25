<?php 
session_start();
include('includes/config.php');
error_reporting(0);
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

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
  <script src="assets/MDB/js/jquery.min.js"></script>  
  <script src="assets/MDB/js/popper.min.js"></script>
  <script src="assets/MDB/js/bootstrap.min.js"></script>
  <script src="assets/MDB/js/mdb.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="assets/MDB/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/MDB/css/bootstrap.css" rel="stylesheet">
  <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="assets/MDB/css/mdb.css" rel="stylesheet">
  <link href="assets/MDB/css/style.css" rel="stylesheet">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="assets/MDB/css/style.css" rel="stylesheet">

  <link href="assets/css/navbar.css" rel="stylesheet">

  <style>
    .nav>li>a {
        position: relative;
        display: block;
        padding: 10px 15px;
        color: white !important;
    }

  </style>
</head>
<body>
  <?php include('includes/header.php');?>
  <section class="gray-bg">
    <div class="container">
      <div class="container">
        <div class="row mt-4">
            <h1 class="font-weight-bold">Body Style</h1>
        </div>
        <?php
            $bodystyle=$_GET['bodystyle'];
            $sql="SELECT * FROM `tblvehicles` where tblvehicles.body_style = '$bodystyle'";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            if(count($results) > 0){
              $i = 0;
              foreach($results as $result){
                $i++;
                ?>
                  <div class="row mt-4" style="text-align: center; border:2px solid black; ">
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4">
                        <div id="carousel-thumb<?php echo htmlentities($i) ?>" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                          <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active ">
                              <img class="d-block  w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                                alt="First slide" height = "150">
                            </div>
                            <div class="carousel-item ">
                              <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>"
                                alt="Second slide" height = "150">
                            </div>
                            <div class="carousel-item ">
                              <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>"
                                alt="Third slide" height = "150">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carousel-thumb<?php echo htmlentities($i) ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carousel-thumb<?php echo htmlentities($i) ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                          <ol class="carousel-indicators">
                            <li data-target="#carousel-thumb<?php echo htmlentities($i) ?>" data-slide-to="0" class="active">
                              <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="92" height="57.5">
                            </li>
                            <li data-target="#carousel-thumb<?php echo htmlentities($i) ?>" data-slide-to="1">
                              <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="92" height="57.5">
                            </li>
                            <li data-target="#carousel-thumb<?php echo htmlentities($i) ?>" data-slide-to="2">
                              <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="91" height="57.5">
                            </li>
                          </ol>
                        </div>
                        <div class="col-lg-12">
                          <a class="btn" href="price_offer.php">Qiymət təklifi ver</a>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4">
                        <div>
                          <p class="text-success text-center font-weight-bold">Marka(Make)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->brand);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">Model(Model)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->model);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">İl-dən(year)</p>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">At gücü(Horse Power)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->price);?></option>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4">
                        <div>
                          <p class="text-success text-center font-weight-bold">Bölgə(Bakı)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->price);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">Kilometraj(Mileage)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->FuelType);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">Sürət qutusu(Avtomat)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->gear_box);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">AZN(Price)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->mileage);?></option>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mt-4">
                        <div>
                          <p class="text-success text-center font-weight-bold">Motor gücü(Motor)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->mileage);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">Yanacaq növü(Dizel)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->gear_box);?></option>
                        </div>
                        <div>
                          <p class="text-success text-center font-weight-bold">Əlaqə(Contact)</p>
                          <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->mileage);?></option>
                        </div>
                        <div>
                          <a class="btn purple-gradient" href="body_style_content.php?id=<?php echo htmlentities($result->id);?>">Detail</a>
                        </div>
                      </div>
                  </div>
                <?php
            }
          }
      ?>
    </div>
  </div>
  <!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

</body>
</html>