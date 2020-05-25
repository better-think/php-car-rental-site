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
                    <h1 class="font-weight-bold">Detail Show</h1>
                </div>
                <?php
                $carid=$_GET['id'];
                $sql="SELECT * FROM `tblvehicles` where tblvehicles.id = '$carid'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                foreach($results as $result){
                ?>
                <div class="mt-4" style="text-align: center;">
                    <div id="carousel-thumb" class="row mt-4 carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                        <div class="carousel-inner col-lg-9 col-md-9 col-sm-9 col-xs-9" role="listbox" style="margin-left:20px">
                            <div class="carousel-item active">
                                <img class="d-block" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>"
                                alt="First slide" height = "400">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>"
                                alt="Second slide" height = "400">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>"
                                alt="Third slide" height = "400">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-12">
                            <div data-target="#carousel-thumb" data-slide-to="0" class="active">
                                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width= "150" height="80">
                            </div>
                            <label></label>
                            <div>
                                <scan style="text-align:center">1</scan>
                            </div>
                            <label></label>
                            <div data-target="#carousel-thumb" data-slide-to="1">
                                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width= "150" height="80">
                            </div>
                            <label></label>
                            <div>
                                <scan style="text-align:center">2</scan>
                            </div>
                            <label></label>
                            <div data-target="#carousel-thumb" data-slide-to="2">
                                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width= "150" height="80">
                            </div>
                            <label></label>
                            <div>
                                <scan style="text-align:center">3</scan>
                            </div>
                            <label></label>
                        </div>
                    </div>
                    <div class="row col-lg-12 col-12">
                        <div class="col-lg-4 mt-4 col-6">
                            <div>
                                <p class="text-success text-center font-weight-bold">Marka(Make)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->make);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Model(Model)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->model);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Kategorya(Category)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->category);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Mənşə ölkəsi(Origin Country)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->origin_country);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">İl-dən(year)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->ModelYear);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Yanacaq növü(Fuel Type)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->FuelType);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">E-mail()</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->email);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">At gücü(Horse Power)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->horse_power);?></option>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-6">
                            <div>
                                <p class="text-success text-center font-weight-bold">Bölgə(baki)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->location);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Kilometraj(Mileage)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->milege);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Sürət qutusu(GearBox/Transmission)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->gear_box);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Maksimal surət(Top Speed)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->top_speed);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">AZN(Price)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->price);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Park sensoru(Parking Senser)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->price);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Telefon(Tele Phone)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->phone);?></option>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 col-6">
                            <div>
                                <p class="text-success text-center font-weight-bold">Mator gücü(Engin Power)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->engine_power);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Yanacaq sərfiyyatı(Fuel consumption)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->fuel_consumption);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Yanacaq çəninin həcmi(Fuel Tank Capacity)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->fuel_tank_capacity);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Oturacaq sayı(Seat)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->SeatingCapacity);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Rəngi (Color)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->color);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Kondisioner (Clima)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->Clima);?></option>
                            </div>
                            <div>
                                <p class="text-success text-center font-weight-bold">Hava yastığı (Airbag)</p>
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->air_bag);?></option>
                            </div>

                        </div>
                        <div class="row col-lg-12 col-12" style="text-align: left;">
                            <div class="col-sm-3">
                                <div>
                                <input type="checkbox" class="form-check-input" id="ParkingSensor" name="ParkingSensor" <?php if($result->ParkingSensor == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="ParkingSensor">Park sensoru</label>
                                </div>
                                <!-- Material inline 2 -->
                                <div>
                                    <input type="checkbox" class="form-check-input" id="seat_heating" name="seat_heating" <?php if($result->seat_heating == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="seat_heating">Oturacaqların istidilməsi </label>
                                </div>
                                <!-- Material inline 3 -->
                                <div>
                                    <input type="checkbox" class="form-check-input" id="ventilation" name="ventilation" <?php if($result->ventilation == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="ventilation">Oturacaqların ventilyasası</label>
                                </div>
                                <div>
                                <input type="checkbox" class="form-check-input" id="ABS" name="ABS"  <?php if($result->ABS == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="ABS">ABS</label>
                                </div>
                                <div>
                                <input  readonly type="checkbox" class="form-check-input" id="Chrome_package" name="Chrome_package"  <?php if($result->Chrome_package == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="Chrome_package">Chrome package</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div>
                                <input type="checkbox" class="form-check-input" id="dont_closed_centeral" name="dont_closed_centeral" <?php if($result->dont_closed_centeral == 1) echo htmlentities('checked');?> readonly>
                                <label class="form-check-label" for="dont_closed_centeral">Mərkəzi qapanma</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Conditioners" name="Conditioners" <?php if($result->Conditioners == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Conditioners">Kondisioner</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Rear_view_camera" name="Rear_view_camera" <?php if($result->Rear_view_camera == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Rear_view_camera">Arxa görüntü kamerası</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="luke" name="luke" <?php if($result->luke == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="luke">Lyuk</label><br>
                                </div>
                            
                            </div>
                            <div class="col-sm-3">
                                <div>
                                <input type="checkbox" class="form-check-input" id="Rain_Sensor" name="Rain_Sensor" <?php if($result->Rain_Sensor == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="Rain_Sensor">Yağış Sensoru</label>
                                </div>
                                <div>
                                <input type="checkbox" class="form-check-input" id="Climate_control" name="Climate_control" <?php if($result->Climate_control == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="Climate_control">Klimat kontrol</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Cruise_control" name="Cruise_control" <?php if($result->Cruise_control == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Cruise_control">Kruze kontrol</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Start_stop" name="Start_stop" <?php if($result->Start_stop == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Start_stop">Start – stop</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Monitor" name="Monitor" <?php if($result->Monitor == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Monitor">Monitor</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Autopilot" name="Autopilot" <?php if($result->Autopilot == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Autopilot">Avtopilot</label>
                                </div>
                                <div>
                                <input type="checkbox" class="form-check-input" id="Autohold" name="Autohold" <?php if($result->Autohold == 1) echo htmlentities('checked');?>>
                                <label class="form-check-label" for="Autohold">Avtohold</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="form-check-input" id="Memory_paket" name="Memory_paket"  <?php if($result->Memory_paket == 1) echo htmlentities('checked');?>>
                                    <label class="form-check-label" for="Memory_paket">Memory paket</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-6 ">
                            <label for="Detailed_information">Əlavə məlumat(Detailed information)</label>
                            <textarea class="form-control rounded-0" id="Detailed_information" name="Detailed_information" rows="4" readonly="true"><?php echo htmlentities($result->VehiclesOverview);?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn" href="price_offer.php?id=<?php echo htmlentities($result->id);?>">Qiymət təklifi ver</a>
                    </div>
                </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>