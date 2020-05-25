<?php
session_start();
error_reporting(0);
include('includes/config.php');
{ 
	if(isset($_POST['submit']) && $_POST['name']) {
		$vimage1=$_FILES["img1"]["name"];
		$vimage2=$_FILES["img2"]["name"];
		$vimage3=$_FILES["img3"]["name"];
    $vimage4=$_FILES["img4"]["name"];
		$vimage5=$_FILES["img5"]["name"];
		$vimage6 = $_FILES["img6"]["name"];
		$vimage7 = $_FILES["img7"]["name"];
		$vimage8=$_FILES["img8"]["name"];
		$vimage9=$_FILES["img9"]["name"];
    $vimage10=$_FILES["img10"]["name"];

    $name = $_POST['name'];
    $surename = $_POST['surename'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $model = $_POST['model'];
    $category = $_POST['category'];
    $engine_power = $_POST['engine_power'];
    $color = $_POST['color'];
    $make = $_POST['make'];
    $origin_country = $_POST['origin_country'];
    $horse_power = $_POST['horse_power'];
    $top_speed = $_POST['top_speed'];
    $mileage = $_POST['mileage'];
    $year = $_POST['year'];
    $fuel_consumption = $_POST['fuel_consumption'];
    $fuel_tank_capacity = $_POST['fuel_tank_capacity'];
    $fuel_type = $_POST['fuel_type'];
    $gear_box = $_POST['gear_box'];
    $SeatingCapacity = $_POST['SeatingCapacity'];
    $ParkingSensor = $_POST['ParkingSensor'];
    $seat_heating = $_POST['seat_heating'];
    $ventilation = $_POST['ventilation'];
    $ABS = $_POST['ABS'];
    $dont_closed_centeral = $_POST['dont_closed_centeral'];
    $Conditioners = $_POST['Conditioners'];
    $Rear_view_camera = $_POST['Rear_view_camera'];
    $luke = $_POST['luke'];
    $Rain_Sensor = $_POST['Rain_Sensor'];
    $Climate_control = $_POST['Climate_control'];
    $Cruise_control = $_POST['Cruise_control'];
    $Start_stop = $_POST['Start_stop'];
    $Monitor = $_POST['Monitor'];
    $Autopilot = $_POST['Autopilot'];
    $Autohold = $_POST['Autohold'];
    $Memory_paket = $_POST['Memory_paket'];
    $Chrome_package = $_POST['Chrome_package'];
    $Detailed_information = $_POST['Detailed_information'];

    $VehiclesTitle = $_POST['VehiclesTitle'];
    $VehiclesBrand = $_POST['VehiclesBrand'];

		$sql="INSERT INTO tblvehicles (name,surename,phone, 
			email,model,category, engine_power, color, brand, origin_country, horse_power,
			top_speed, mileage, ModelYear, fuel_consumption, fuel_tank_capacity, FuelType,
			transmission, SeatingCapacity, ParkingSensor,seat_heating, ventilation, ABS, dont_closed_centeral, 
			Conditioners, Rear_view_camera, luke, Rain_Sensor, Climate_control, Cruise_control, Start_stop,
      Monitor, Autopilot, Autohold, Memory_paket, Chrome_package, VehiclesOverview, Vimage1, Vimage2, Vimage3,
      Vimage4, Vimage5, Vimage6, Vimage7, Vimage8, Vimage9, Vimage10, type, VehiclesTitle, VehiclesBrand) 
			VALUES(:name, :surename, :phone, 
			:email, :model, :category, :engine_power, :color, :make, :origin_country, :horse_power,
			:top_speed, :mileage, :ModelYear, :fuel_consumption, :fuel_tank_capacity, :FuelType,
			:gear_box, :SeatingCapacity, :ParkingSensor,:seat_heating, :ventilation, :ABS, :dont_closed_centeral, 
			:Conditioners, :Rear_view_camera, :luke, :Rain_Sensor, :Climate_control, :Cruise_control, :Start_stop,
      :Monitor, :Autopilot, :Autohold, :Memory_paket, :Chrome_package, :Detailed_information, :vimage1, :vimage2,
       :vimage3, :vimage4,
      :vimage5, :vimage6, :vimage7, :vimage8, :vimage9, :vimage10, 'sell', :VehiclesTitle, :VehiclesBrand)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':VehiclesTitle', $VehiclesTitle, PDO::PARAM_STR);
    $query->bindParam(':VehiclesBrand', $VehiclesBrand, PDO::PARAM_STR);
    
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':surename', $surename, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':model', $model, PDO::PARAM_STR);
    $query->bindParam(':category', $category, PDO::PARAM_STR);
    $query->bindParam(':engine_power', $engine_power, PDO::PARAM_STR);
    $query->bindParam(':color', $color, PDO::PARAM_STR);
    $query->bindParam(':make', $make, PDO::PARAM_STR);
    $query->bindParam(':origin_country', $origin_country, PDO::PARAM_STR);
    $query->bindParam(':horse_power', $horse_power, PDO::PARAM_STR);
    $query->bindParam(':top_speed', $top_speed, PDO::PARAM_STR);
    $query->bindParam(':mileage', $mileage, PDO::PARAM_STR);
    $query->bindParam(':ModelYear', $year, PDO::PARAM_STR);
    $query->bindParam(':fuel_consumption', $fuel_consumption, PDO::PARAM_STR);
    $query->bindParam(':fuel_tank_capacity', $fuel_tank_capacity, PDO::PARAM_STR);
    $query->bindParam(':FuelType', $fuel_type, PDO::PARAM_STR);

    $query->bindParam(':gear_box', $gear_box, PDO::PARAM_STR);
    $query->bindParam(':SeatingCapacity', $SeatingCapacity, PDO::PARAM_STR);
    $query->bindParam(':ParkingSensor', $ParkingSensor, PDO::PARAM_STR);
    $query->bindParam(':seat_heating', $seat_heating, PDO::PARAM_STR);
    $query->bindParam(':ventilation', $ventilation, PDO::PARAM_STR);
    $query->bindParam(':ABS', $ABS, PDO::PARAM_STR);
    $query->bindParam(':dont_closed_centeral', $dont_closed_centeral, PDO::PARAM_STR);
    $query->bindParam(':Conditioners', $Conditioners, PDO::PARAM_STR);
    $query->bindParam(':Rear_view_camera', $Rear_view_camera, PDO::PARAM_STR);
    $query->bindParam(':luke', $luke, PDO::PARAM_STR);
    $query->bindParam(':Rain_Sensor', $Rain_Sensor, PDO::PARAM_STR);
    $query->bindParam(':Climate_control', $Climate_control, PDO::PARAM_STR);
    $query->bindParam(':Cruise_control', $Cruise_control, PDO::PARAM_STR);
    $query->bindParam(':Start_stop', $Start_stop, PDO::PARAM_STR);
    $query->bindParam(':Monitor', $Monitor, PDO::PARAM_STR);
    $query->bindParam(':Autopilot', $Autopilot, PDO::PARAM_STR);
    $query->bindParam(':Autohold', $Autohold, PDO::PARAM_STR);
    $query->bindParam(':Memory_paket', $Memory_paket, PDO::PARAM_STR);
    $query->bindParam(':Chrome_package', $Chrome_package, PDO::PARAM_STR);
    $query->bindParam(':Detailed_information', $Detailed_information, PDO::PARAM_STR);

    $query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
    $query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
    $query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
    $query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
    $query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
    $query->bindParam(':vimage6', $vimage6, PDO::PARAM_STR);
    $query->bindParam(':vimage7', $vimage7, PDO::PARAM_STR);
    $query->bindParam(':vimage8', $vimage8, PDO::PARAM_STR);
    $query->bindParam(':vimage9', $vimage9, PDO::PARAM_STR);
    $query->bindParam(':vimage10', $vimage10, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();

		if($lastInsertId) 
		{
      $msg = "Success!";
      move_uploaded_file($_FILES["img1"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img1"]["name"]);
      move_uploaded_file($_FILES["img2"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img2"]["name"]);
      move_uploaded_file($_FILES["img3"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img3"]["name"]);
      move_uploaded_file($_FILES["img4"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img4"]["name"]);
      move_uploaded_file($_FILES["img5"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img5"]["name"]);
      move_uploaded_file($_FILES["img6"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img6"]["name"]);
      move_uploaded_file($_FILES["img7"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img7"]["name"]);
      move_uploaded_file($_FILES["img8"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img8"]["name"]);
      move_uploaded_file($_FILES["img9"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img9"]["name"]);
      move_uploaded_file($_FILES["img10"]["tmp_name"],"admin/img/vehicleimages/".$_FILES["img10"]["name"]);
  
  
		}
		else 
		{
			$error = "Something went wrong. Please try again";
		}
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
  <link href="assets/css/navbar.css" rel="stylesheet">

  <style>
    div.unit {
      display: flex;
    }
      div.unit input.form-control {
        width: 80%;
      }
      div.unit > span {
        margin-top: 2%;
        margin-left: 2%;
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
  <!-- sell and buy section -->
  <div class="container">
        <div class="row">
          <div class="col-md-10" style="left: 50%;  transform: translateX(-50%);">
           <h2 class="primary-heading">SAT(SELL)</h2>
            <form method="post" enctype="multipart/form-data" class="dropzone form-horizontal" >
              <!-- Grid row -->
              <?php
                if($msg) {
                  echo "<h3>Sucess</h3>";
                }
                if($error) {
                  echo "<h3>ERROR</h3>";
                }
              ?>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="name">AD</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="surename">Soyad</label>
                  <input type="text" class="form-control" id="surename" name="surename" placeholder="surename" required>
                </div>
                <div class="form-group  col-md-3">
                  <label for="phone">Telefon</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="35102340123" required>
                </div>
                <div class="form-group  col-md-3">
                  <label for="email">e-mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="tom@gmail.com0" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group  col-md-3">
                  <label for="VehiclesTitle">Vehicles Title</label>
                  <input type="VehiclesTitle" class="form-control" id="VehiclesTitle" name="VehiclesTitle" placeholder="..." required>
                </div>
                <select class="mdb-select md-form col-md-4" editable="true" name="make" searchable="Search and add here..." required>
                  <option value="" disabled selected>Marka (Make)</option>
                  <?php
                    $sql = "SELECT * FROM `tblbrands` ORDER BY name ASC ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0) 
                    {
                      foreach($results as $result) {
                        echo '<option value="'. $result->name .'">' . $result->name . '</option>';
                      }
                    }
                  ?>
                </select>
                <label class="mdb-main-label" >Marka (Make)</label>

                <!-- Model row -->
                <select class="mdb-select md-form col-md-4" editable="true" name="model" searchable="Search and add here..." required>
                  <option value="" disabled selected>Model</option>
                  <?php
                    $sql = "SELECT * FROM `tblmodel` ORDER BY name ASC ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0) 
                    {
                      foreach($results as $result) {
                        echo '<option value="'. $result->name .'">' . $result->name . '</option>';
                      }
                    }
                  ?>
                </select>
                <label class="mdb-main-label" >Model</label>
                <!-- Category -->
                <div class="form-group  col-md-4">
                  <label for="category">Kateqorya (Category)</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="category" required>
                </div>
                <!-- Engine Power -->
                <div class="form-group  col-md-4">
                  <label for="engine_power">Mator gücü(Eng.Power)</label>
                  <div class="unit">
                    <input type="text" class="form-control" id="engine_power" name="engine_power" placeholder="230" required>
                    <span>Kw</span>
                  </div>
                </div>
                <!-- Color -->
                <div class="form-group  col-md-4">
                  <label for="color">Rəngi (Colour)</label>
                  <input type="text" class="form-control" id="color" name="color" placeholder="red" required>
                </div>
                <!-- Make
                <div class="form-group  col-md-4">
                  <label for="Make">Marka (Make)</label>
                  <input type="text" class="form-control" id="Make" name="make" placeholder="Marka" required>
                </div> -->
                <!-- Origin Count -->
                <div class="form-group  col-md-4">
                  <label for="origin_country">Mənşə ölkəsi</label>
                  <input type="text" class="form-control" id="origin_country" name="origin_country" placeholder="Origin Count" required>
                </div>
                <!-- Horsepower -->
                <div class="form-group  col-md-4">
                  <label for="Horsepower">At gücü (Horsepower)</label>
                  <div class="unit">
                    <input type="text" class="form-control" id="Horsepower" name="horse_power" placeholder="250" required>
                    <span>PH</span>
                  </div>
                </div>
                <!-- Top speed -->
                <div class="form-group  col-md-4">
                  <label for="top_speed">Maksimal surət (Top speed)</label>
                  <input type="text" class="form-control" id="top_speed" name="top_speed" placeholder="120" required>Km/h
                </div>
                <!-- Kilometraj (Mileage) -->
                <div class="form-group  col-md-4">
                  <label for="Mileage">Kilometraj (Mileage)</label>
                  <div class="unit">
                    <input type="text" class="form-control" id="Mileage" name="mileage" placeholder="1234" required>
                    <span> mileage</span>
                  </div>
                </div>
                <!-- İli (Year) -->
                <div class="form-group  col-md-4">
                  <label for="year">İli (Year)</label>
                  <input type="text" class="form-control" id="year" name="year" placeholder="2021" required>
                </div>
                <!-- Yanacaq sərfiyyat(Fuel consup) -->
                <div class="form-group  col-md-4">
                  <label for="fule_consup">Yanacaq sərfiyyat(Fuel consup)</label>

                  <div class="unit">
                    <input type="text" class="form-control" id="fule_consup" name="fuel_consumption" placeholder="11" required>
                    <span>L<span>
                  </div>
                </div>
                <!-- Fuel tank capacity -->
                <div class="form-group  col-md-4">
                  <label for="fuel_tank_capacity">Yanacaq çəninin həcmi(Fuel tank capacity)</label>
                  <div class="unit">
                    <input type="text" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" placeholder="11" required>L
                  </div>
                </div>
                <!-- Yanacaq növü (Fuel type) -->
                <select class="mdb-select md-form col-md-4" editable="true" name="fuel_type" searchable="Search and add here..." required>
                  <option value="" disabled selected>Fuel Type</option>
                  <?php
                    $sql = "SELECT * FROM `tblfuel_type` ORDER BY type ASC ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 0;
                    if($query->rowCount() > 0) 
                    {
                      foreach($results as $result) {
                        echo '<option value="'. $result->type .'">' . $result->type . '</option>';
                      }
                    }
                  ?>
                </select>
                <label class="mdb-main-label">Fuel Type</label>

                <!-- Yanacaq növü (Fuel type) -->
                <select class="mdb-select md-form col-md-4" editable="true" name="gear_box" searchable="Search and add here..." required>
                  <option value="" disabled selected>Gear Box</option>
                  <?php
                    $sql = "SELECT * FROM `tblgear_box` ORDER BY name ASC ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 0;
                    if($query->rowCount() > 0) 
                    {
                      foreach($results as $result) {
                        echo '<option value="'. $result->name .'">' . $result->name . '</option>';
                      }
                    }
                  ?>
                </select>
                <label class="mdb-main-label">Sürət qutusu (Transmission/Gear Box)</label>

                <div class="form-group col-md-4">
                  <label for="numberofSeat">Oturacaq sayı (Number of seat)</label>
                  <input type="text" class="form-control" id="numberofSeat" name="SeatingCapacity" placeholder="4" required>
                </div>
              </div>
              <!-- Material unchecked -->
              <!-- Material inline 1 -->
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="ParkingSensor" name="ParkingSensor" value="1">
                    <label class="form-check-label" for="ParkingSensor">Park sensoru</label>
                  </div>
                  <!-- Material inline 2 -->
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="seat_heating" name="seat_heating" value="1">
                      <label class="form-check-label" for="seat_heating">Oturacaqların istidilməsi </label>
                  </div>
                  <!-- Material inline 3 -->
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="ventilation" name="ventilation" value="1">
                      <label class="form-check-label" for="ventilation">Oturacaqların ventilyasası</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="ABS" name="ABS" value="1">
                    <label class="form-check-label" for="ABS">ABS</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="dont_closed_centeral" name="dont_closed_centeral" value="1">
                    <label class="form-check-label" for="dont_closed_centeral">Mərkəzi qapanma</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Conditioners" name="Conditioners" value="1">
                      <label class="form-check-label" for="Conditioners">Kondisioner</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Rear_view_camera" name="Rear_view_camera" value="1">
                      <label class="form-check-label" for="Rear_view_camera">Arxa görüntü kamerası</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="luke" name="luke" value="1">
                      <label class="form-check-label" for="luke">Lyuk (Luke)</label><br>
                  </div>
                
                </div>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="Rain_Sensor" name="Rain_Sensor" value="1">
                    <label class="form-check-label" for="Rain_Sensor">Yağış Sensoru</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="Climate_control" name="Climate_control" value="1">
                    <label class="form-check-label" for="Climate_control">Klimat kontrol</label>
                  </div>
                  <br>
                  
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Cruise_control" name="Cruise_control" value="1">
                      <label class="form-check-label" for="Cruise_control">Kruze kontrol</label>
                  </div>
                  <br>

                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Start_stop" name="Start_stop" value="1">
                      <label class="form-check-label" for="Start_stop">Start – stop</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Monitor" name="Monitor" value="1">
                      <label class="form-check-label" for="Monitor">Monitor</label>
                  </div>
                  <br>

                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Autopilot" name="Autopilot" value="1">
                      <label class="form-check-label" for="Autopilot">Avtopilot</label>
                  </div>
                  <br>

                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="Autohold" name="Autohold" value="1">
                    <label class="form-check-label" for="Autohold">Avtohold</label>
                  </div>
                  <br>

                  <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="Memory_paket" name="Memory_paket" value="1">
                      <label class="form-check-label" for="Memory_paket">Memory paket</label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" id="Chrome_package" name="Chrome_package" value="1">
                    <label class="form-check-label" for="Chrome_package">Chrome package</label>
                  </div>
                <hr/>
                </div>
                <hr/>
                <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="img1">IMG1</label>
                  <input type="file"  id="img1" name="img1" placeholder="file1" required >
                </div>
                <div class="form-group col-md-3">
                  <label for="img2">IMG2</label>
                  <input type="file" class="form-control" id="img2" name="img2" placeholder="file2" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="img3">IMG3</label>
                  <input type="file" class="form-control" id="img3" name="img3" placeholder="file3" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="img4">IMG4</label>
                  <input type="file" class="form-control" id="img4" name="img4" placeholder="file4" >
                </div>

                <div class="form-group col-md-3">
                  <label for="img5">IMG5</label>
                  <input type="file" class="form-control" id="img5" name="img5" placeholder="file5">
                </div>
                <div class="form-group col-md-3">
                  <label for="img5">IMG6</label>
                  <input type="file" class="form-control" id="img6" name="img6" placeholder="file6">
                </div>
                <div class="form-group col-md-3">
                  <label for="img6">IMG7</label>
                  <input type="file" class="form-control" id="img7" name="img7" placeholder="file7">
                </div>
                <div class="form-group col-md-3">
                  <label for="img7">IMG8</label>
                  <input type="file" class="form-control" id="img8" name="img8" placeholder="file8">
                </div>
                <div class="form-group col-md-3">
                  <label for="img8">IMG9</label>
                  <input type="file" class="form-control" id="img9" name="img9" placeholder="file9">
                </div>
                <div class="form-group col-md-3">
                  <label for="img9">IMG10</label>
                  <input type="file" class="form-control" id="img10" name="img10" placeholder="file10">
                </div>
              </div>
              </div>
              <div class="form-group">
                <label for="Detailed_information">Əlavə məlumat(Detailed information)</label>
                <textarea class="form-control rounded-0" id="Detailed_information" name="Detailed_information" rows="4"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-md">SUBMIT</button>
            </form>
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
        // $('.file-upload').file_upload();
        });
    </script>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>