<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
	  $vimage1=$_FILES["img1"]["name"];

    $fileNames = array();
    for ($i=1; $i < 11; $i++) { 
      $fileNames[]=$_FILES["img".$i]["name"];
      move_uploaded_file($_FILES["img".$i]["tmp_name"],"img/vehicleimages/".$_FILES["img".$i]["name"]);
    }

    $name = $_POST['name'];
      $surename = $_POST['surename'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $model = $_POST['model'];
      $category = $_POST['category'];
      $engine_power = $_POST['engine_power'];
      $color = $_POST['color'];
      $origin_country = $_POST['origin_country'];
      $horse_power = $_POST['horse_power'];
      $top_speed = $_POST['top_speed'];
      $mileage = $_POST['mileage'];
      $year = $_POST['year'];
      $fuel_consumption = $_POST['fuel_consumption'];
      $fuel_tank_capacity = $_POST['fuel_tank_capacity'];
      $fuel_type = $_POST['fuel_type'];
      $gear_box = $_POST['gear_box'];
      $price = $_POST['price'];
      $PricePerDay= $_POST['PricePerDay'];
      $body_style= $_POST['body_style'];
      $average_price = $_POST['average_price'];
      $brand = $_POST['brand'];
      $type = $_POST['type'];
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
      $vehicle = $_POST['vehicle'];
    $id=intval($_GET['id']);
		$sql="UPDATE tblvehicles set VehiclesTitle=:vehicle,name=:name,surename=:surename,phone=:phone, 
			email=:email,model=:model,category=:category,engine_power=:engine_power,color=:color, origin_country=:origin_country,horse_power=:horse_power,
			top_speed=:top_speed,mileage=:mileage,ModelYear=:ModelYear,fuel_consumption=:fuel_consumption, fuel_tank_capacity=:fuel_tank_capacity,FuelType=:FuelType,
			transmission=:gear_box,SeatingCapacity=:SeatingCapacity,ParkingSensor=:ParkingSensor,seat_heating=:seat_heating, ventilation=:ventilation,ABS=:ABS,dont_closed_centeral=:dont_closed_centeral, 
			Conditioners=:Conditioners,Rear_view_camera=:Rear_view_camera,luke=:luke,Rain_Sensor=:Rain_Sensor, Climate_control=:Climate_control,Cruise_control=:Cruise_control,Start_stop= :Start_stop,
      Monitor=:Monitor,Autopilot=:Autopilot, Autohold=:Autohold,Memory_paket=:Memory_paket, Chrome_package=:Chrome_package,VehiclesOverview=:Detailed_information,
      PricePerDay=:PricePerDay,price=:price,body_style=:body_style,average_price=:average_price,brand=:brand,type=:type ";
    foreach ($fileNames as $key => $filename) {
      if($filename == "") {
        continue;
      }
      $temp = ", Vimage". ($key + 1) . "='$filename' ";
      $sql .= $temp;
    }
    $sql .= " WHERE id=:id";
    // print_r($sql);exit;

    $query = $dbh->prepare($sql);
    
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':surename', $surename, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':model', $model, PDO::PARAM_STR);
    $query->bindParam(':category', $category, PDO::PARAM_STR);
    $query->bindParam(':engine_power', $engine_power, PDO::PARAM_STR);
    $query->bindParam(':color', $color, PDO::PARAM_STR);
    $query->bindParam(':origin_country', $origin_country, PDO::PARAM_STR);
    $query->bindParam(':horse_power', $horse_power, PDO::PARAM_STR);
    $query->bindParam(':top_speed', $top_speed, PDO::PARAM_STR);
    $query->bindParam(':mileage', $mileage, PDO::PARAM_STR);
    $query->bindParam(':ModelYear', $year, PDO::PARAM_STR);
    $query->bindParam(':fuel_consumption', $fuel_consumption, PDO::PARAM_STR);
    $query->bindParam(':fuel_tank_capacity', $fuel_tank_capacity, PDO::PARAM_STR);
    $query->bindParam(':FuelType', $fuel_type, PDO::PARAM_STR);

    $query->bindParam(':PricePerDay', $PricePerDay, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':body_style', $body_style, PDO::PARAM_STR);
    $query->bindParam(':average_price', $average_price, PDO::PARAM_STR);
    $query->bindParam(':brand', $brand, PDO::PARAM_STR);
    $query->bindParam(':type', $type  , PDO::PARAM_STR);

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

    $query->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    $msg="Data updated successfully";
}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Edit Vehicle Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css">
  <link href="../assets/css/slick.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="../assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="../assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 


  <script src="../assets/MDB/js/jquery.min.js"></script>  
  <script src="../assets/MDB/js/popper.min.js"></script>
  <script src="../assets/MDB/js/bootstrap.min.js"></script>
  <script src="../assets/MDB/js/mdb.min.js"></script>
  <script src="../assets/MDB/js/addons-pro/multi-range.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../assets/MDB/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/MDB/css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="../assets/MDB/css/mdb.css" rel="stylesheet">
  <link href="../assets/MDB/css/addons-pro/multi-range.min.css" rel="stylesheet">
  <link href="../assets/MDB/css/style.css" rel="stylesheet">

  <!-- <link href="../assets/MDB/material-select-view.min.js" rel="stylesheet"> -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">


  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link href="../assets/MDB/css/mdb.min.css" rel="stylesheet">
  <link href="../assets/MDB/css/style.css" rel="stylesheet">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
  <div class="content-wrapper">
<?php 
              $id=intval($_GET['id']);
              $sql ="SELECT * from tblvehicles where id=:id";
              $query = $dbh -> prepare($sql);
              $query-> bindParam(':id', $id, PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
              foreach($results as $result)
              {	?>
<section class="section-padding gray-bg">
  <!-- sell and buy section -->
  <div class="container">
        <div class="row">
          <div class="col-md-10" style="left: 50%;  transform: translateX(-50%);">
           <h2 class="primary-heading">Change Vehicle</h2>
            <form method="post" enctype="multipart/form-data" class="dropzone form-horizontal" >
              <!-- Grid row -->
              <?php
                if($msg) {
                  echo "<h3>$msg</h3>";
                }
                if($error) {
                  echo "<h3>ERROR</h3>";
                }
              ?>
             
              <div class="form-row">
                <div class="form-group col-md-3">
                  <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img1">IMG1</label>
                  <input type="file"  id="img1" name="img1" placeholder="file1" >
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img2">IMG2</label>
                  <input type="file" id="img2" name="img2" placeholder="file2" >
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img3">IMG3</label>
                  <input type="file" id="img3" name="img3" placeholder="file3" >
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img4">IMG4</label>
                  <input type="file" id="img4" name="img4" placeholder="file4" >
                </div>

                <div class="form-group col-md-3">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img5">IMG5</label>
                  <input type="file" id="img5" name="img5" placeholder="file5">
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage6);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img5">IMG6</label>
                  <input type="file" id="img6" name="img6" placeholder="file6">
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage7);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img6">IMG7</label>
                  <input type="file" id="img7" name="img7" placeholder="file7">
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage8);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img7">IMG8</label>
                  <input type="file" id="img8" name="img8" placeholder="file8">
                </div>
                <div class="form-group col-md-3">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage9);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img8">IMG9</label>
                  <input type="file" id="img9" name="img9" placeholder="file9">
                </div>
                <div class="form-group col-md-3" style="margin-left:20px">
                <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage10);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  <label for="img9">IMG10</label>
                  <input type="file" id="img10" name="img10" placeholder="file10">
                </div>
                <div class="form-group col-md-6" height="200" position="relative">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Vehicle Title</label><br/>
                  <input type="text" value="<?php echo htmlentities($result->VehiclesTitle);?>" class="form-control" id="vehicle" name="vehicle" placeholder="Vehicle Title" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group col-md-6">
                  <label for="name">AD</label><br/>
                  <input type="text" value="<?php echo htmlentities($result->name);?>" class="form-control" id="name" name="name" placeholder="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="surename">Soyad</label><br/>
                  <input type="text" value="<?php echo htmlentities($result->surename);?>" class="form-control" id="surename" name="surename" placeholder="surename" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group  col-md-6">
                  <label for="phone">Telefon</label><br/>
                  <input type="text" value="<?php echo htmlentities($result->phone);?>" class="form-control" id="phone" name="phone" placeholder="35102340123" required>
                </div>
                <div class="form-group  col-md-6">
                  <label for="email">e-mail</label><br/>
                  <input value="<?php echo htmlentities($result->email);?>" type="email" class="form-control" id="email" name="email" placeholder="tom@gmail.com0" required>
                </div>
              </div>
              <div class="form-row">
                <!-- Model row -->
                <div class="form-group  col-md-4">
                  <label class="mdb-main-label" >Model</label>
                  <select class=" md-form form-control col-md-12" editable="true" name="model" searchable="Search and add here..." >
                    <option disabled value="<?php echo htmlentities($result->model);?>" selected><?php echo htmlentities($result->model);?></option>
                    <?php
                      $sql = "SELECT * FROM `tblmodel` ORDER BY name ASC ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results1=$query->fetchAll(PDO::FETCH_OBJ);
                      if($query->rowCount() > 0) 
                      {
                        foreach($results1 as $result1) {
                          echo '<option value="'. $result1->name .'">' . $result1->name . '</option>';
                        }
                      }
                    ?>
                  </select>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Category -->
                <div class="form-group  col-md-4">
                  <label for="category">Kateqorya (Category)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->category);?>" class="form-control" id="category" name="category" placeholder="category" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Engine Power -->
                <div class="form-group  col-md-4">
                  <label for="engine_power">Mator gücü(Eng.Power)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->engine_power);?>" class="form-control" id="engine_power" name="engine_power" placeholder="230kw" required>
                </div>
                <!-- Color -->
                <div class="form-group  col-md-4">
                  <label for="color">Rəngi (Colour)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->color);?>" class="form-control" id="color" name="color" placeholder="red" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Origin Count -->
                <div class="form-group  col-md-4">
                  <label for="origin_country">Mənşə ölkəsi</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->origin_country);?>" class="form-control" id="origin_country" name="origin_country" placeholder="Origin Count" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Horsepower -->
                <div class="form-group  col-md-4">
                  <label for="Horsepower">At gücü (Horsepower)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->horse_power);?>" class="form-control" id="Horsepower" name="horse_power" placeholder="250PH" required>
                </div>
                <!-- Top speed -->
                <div class="form-group  col-md-4">
                  <label for="top_speed">Maksimal surət (Top speed)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->top_speed);?>" class="form-control" id="top_speed" name="top_speed" placeholder="120Km/h" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Kilometraj (Mileage) -->
                <div class="form-group  col-md-4">
                  <label for="Mileage">Kilometraj (Mileage)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->mileage);?>" class="form-control" id="Mileage" name="mileage" placeholder="1234 mile" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- İli (Year) -->
                <div class="form-group  col-md-4">
                  <label for="year">İli (Year)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->ModelYear);?>" class="form-control" id="year" name="year" placeholder="2021" required>
                </div>
                <!-- Yanacaq sərfiyyat(Fuel consup) -->
                <div class="form-group  col-md-4">
                  <label for="fule_consup">Yanacaq sərfiyyat(Fuel consup)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->fuel_consumption);?>" class="form-control" id="fule_consup" name="fuel_consumption" placeholder="11L" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Fuel tank capacity -->
                <div class="form-group  col-md-4">
                  <label for="fuel_tank_capacity">Yanacaq çəninin həcmi(Fuel tank capacity)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->fuel_tank_capacity);?>" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" placeholder="11L" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- Yanacaq növü (Fuel type) -->
                <div class="form-group  col-md-4">
                    <label class="mdb-main-label">Fuel Type</label>
                    <select class="md-form form-control  col-md-12" editable="true" name="fuel_type" searchable="Search and add here..." >
                      <option disabled value="<?php echo htmlentities($result->FuelType);?>" selected><?php echo htmlentities($result->FuelType);?></option>
                      <?php
                        $sql = "SELECT * FROM `tblfuel_type` ORDER BY type ASC ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results2=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 0;
                        if($query->rowCount() > 0) 
                        {
                          foreach($results2 as $result2) {
                            echo '<option value="'. $result2->type .'">' . $result2->type . '</option>';
                          }
                        }
                      ?>
                    </select>
                  </div>

                <!-- Yanacaq növü (Fuel type) -->
                <div class="form-group col-md-4">
                    <label class="mdb-main-label">Sürət qutusu (Transmission/Gear Box)</label>
                    <select class="md-form form-control  col-md-12" editable="true" name="gear_box" searchable="Search and add here..." >
                      <option disabled value="<?php echo htmlentities($result->transmission);?>" selected><?php echo htmlentities($result->transmission);?></option>
                      <?php
                        $sql = "SELECT * FROM `tblgear_box` ORDER BY name ASC ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results3=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 0;
                        if($query->rowCount() > 0) 
                        {
                          foreach($results3 as $result3) {
                            echo '<option value="'. $result3->name .'">' . $result3->name . '</option>';
                          }
                        }
                      ?>
                    </select>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group col-md-4">
                  <label for="numberofSeat">Oturacaq sayı (Number of seat)</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->SeatingCapacity);?>" class="form-control" id="numberofSeat" name="SeatingCapacity" placeholder="4" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group  col-md-4">
                  <label class="mdb-main-label" >Type</label>
                  <select class=" md-form form-control col-md-12" editable="true" name="type" searchable="Search and add here..." >
                    <option disabled value="<?php echo htmlentities($result->type);?>" selected><?php echo htmlentities($result->type);?></option>
                    <option value="lend">lend</option>
                    <option value="buy">buy</option>
                    <option value="sell">sell</option>
                  </select>
                  </div>
                  <div class="form-group  col-md-4">
                  <label class="mdb-main-label" >Marka (Make)</label>
                  <select class=" md-form form-control col-md-12" editable="true" name="brand" searchable="Search and add here..." >
                    <option disabled value="<?php echo htmlentities($result->brand);?>" selected><?php echo htmlentities($result->brand);?></option>
                    <?php
                      $sql = "SELECT * FROM `tblbrands` ORDER BY name ASC ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results5=$query->fetchAll(PDO::FETCH_OBJ);
                      if($query->rowCount() > 0) 
                      {
                        foreach($results5 as $result5) {
                          echo '<option value="'. $result5->name .'">' . $result5->name . '</option>';
                        }
                      }
                    ?>
                  </select>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="form-group  col-md-4">
                  <label class="mdb-main-label" >body_style</label>
                  <select class=" md-form form-control col-md-12" editable="true" name="body_style" searchable="Search and add here..." >
                    <option disabled value="<?php echo htmlentities($result->body_style);?>" selected><?php echo htmlentities($result->body_style);?></option>
                    <?php
                      $sql = "SELECT * FROM `tblbody_style` ORDER BY name ASC ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results6=$query->fetchAll(PDO::FETCH_OBJ);
                      if($query->rowCount() > 0) 
                      {
                        foreach($results6 as $result6) {
                          echo '<option value="'. $result6->name .'">' . $result6->name . '</option>';
                        }
                      }
                    ?>
                  </select>
                  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="form-group  col-md-4">
                  <label for="top_speed">PricePerDay</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->PricePerDay);?>" class="form-control" id="PricePerDay" name="PricePerDay" placeholder="120$" required>
                </div>
                <div class="form-group  col-md-4">
                  <label for="top_speed">price</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->price);?>" class="form-control" id="price" name="price" placeholder="12000$" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group  col-md-4">
                  <label for="top_speed">average_price</label><br/><br/>
                  <input type="text" value="<?php echo htmlentities($result->average_price);?>" class="form-control" id="average_price" name="average_price" placeholder="11900$" required>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              <div class="row">
                <div class="col-sm-3">

                  <?php if($result->ParkingSensor==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ParkingSensor" name="ParkingSensor" checked value="1">
                    <label class="form-check-label" for="ParkingSensor"> Parking Sensor </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ParkingSensor" name="ParkingSensor" value="1">
                    <label class="form-check-label" for="ParkingSensor"> Parking Sensor </label>
                    </div>
                    <?php } ?>
                    <?php if($result->seat_heating==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="seat_heating" name="seat_heating" checked value="1">
                    <label class="form-check-label" for="seat_heating"> Oturacaqların istidilməsi </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="seat_heating" name="seat_heating" value="1">
                    <label class="form-check-label" for="seat_heating"> Oturacaqların istidilməsi </label>
                    </div>
                    <?php } ?>
                    <?php if($result->ventilation==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ventilation" name="ventilation" checked value="1">
                    <label class="form-check-label" for="ventilation"> Oturacaqların ventilyasası </label>
                    </div><br/><br/>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ventilation" name="ventilation" value="1">
                    <label class="form-check-label" for="ventilation"> Oturacaqların ventilyasası </label>
                    </div><br/><br/>
                    <?php } ?>
                    <?php if($result->ABS==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ABS" name="ABS" checked value="1">
                    <label class="form-check-label" for="ABS"> ABS </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="ABS" name="ABS" value="1">
                    <label class="form-check-label" for="ABS"> ABS </label>
                    </div>
                    <?php } ?>
                    
                  </div>
                  <div class="col-sm-3">
                    <?php if($result->Conditioners==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Conditioners" name="Conditioners" checked value="1">
                    <label class="form-check-label" for="Conditioners"> Kondisioner </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Conditioners" name="Conditioners" value="1">
                    <label class="form-check-label" for="Conditioners"> Kondisioner </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Rear_view_camera==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Rear_view_camera" name="Rear_view_camera" checked value="1">
                    <label class="form-check-label" for="Rear_view_camera"> Arxa görüntü kamerası </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Rear_view_camera" name="Rear_view_camera" value="1">
                    <label class="form-check-label" for="Rear_view_camera"> Arxa görüntü kamerası </label>
                    </div>
                    <?php } ?>
                    <?php if($result->luke==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="luke" name="luke" checked value="1">
                    <label class="form-check-label" for="luke"> Lyuk (Luke) </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="luke" name="luke" value="1">
                    <label class="form-check-label" for="luke"> Lyuk (Luke) </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Chrome_package==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Chrome_package" name="Chrome_package" checked value="1">
                    <label class="form-check-label" for="Chrome_package"> Chrome package </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Chrome_package" name="Chrome_package" value="1">
                    <label class="form-check-label" for="Chrome_package"> Chrome package </label>
                    </div>
                    <?php } ?>
                    <?php if($result->dont_closed_centeral==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="dont_closed_centeral" name="dont_closed_centeral" checked value="1">
                    <label class="form-check-label" for="dont_closed_centeral"> Mərkəzi qapanma </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="dont_closed_centeral" name="dont_closed_centeral" value="1">
                    <label class="form-check-label" for="dont_closed_centeral"> Mərkəzi qapanma </label>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-sm-3">
                    <?php if($result->Rain_Sensor==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Rain_Sensor" name="Rain_Sensor" checked value="1">
                    <label class="form-check-label" for="Rain_Sensor"> Yağış Sensoru </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Rain_Sensor" name="Rain_Sensor" value="1">
                    <label class="form-check-label" for="Rain_Sensor"> Yağış Sensoru </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Climate_control==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Climate_control" name="Climate_control" checked value="1">
                    <label class="form-check-label" for="Climate_control"> Klimat kontrol </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Climate_control" name="Climate_control" value="1">
                    <label class="form-check-label" for="Climate_control"> Klimat kontrol </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Cruise_control==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Cruise_control" name="Cruise_control" checked value="1">
                    <label class="form-check-label" for="Cruise_control"> Kruze kontrol </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Cruise_control" name="Cruise_control" value="1">
                    <label class="form-check-label" for="Cruise_control"> Kruze kontrol </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Start_stop==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Start_stop" name="Start_stop" checked value="1">
                    <label class="form-check-label" for="Start_stop"> Start – stop </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Start_stop" name="Start_stop" value="1">
                    <label class="form-check-label" for="Start_stop"> Start – stop </label>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="col-sm-3">
                    <?php if($result->Monitor==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Monitor" name="Monitor" checked value="1">
                    <label class="form-check-label" for="Monitor"> Monitor </label>
                    </div><br/>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Monitor" name="Monitor" value="1">
                    <label class="form-check-label" for="Monitor"> Monitor </label>
                    </div><br/>
                    <?php } ?>
                    <?php if($result->Autopilot==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Autopilot" name="Autopilot" checked value="1">
                    <label class="form-check-label" for="Autopilot"> Autopilot </label>
                    </div>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Autopilot" name="Autopilot" value="1">
                    <label class="form-check-label" for="Autopilot"> Autopilot </label>
                    </div>
                    <?php } ?>
                    <?php if($result->Autohold==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Autohold" name="Autohold" checked value="1">
                    <label class="form-check-label" for="Autohold"> Autohold</label>
                    </div><br/>
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Autohold" name="Autohold" value="1">
                    <label class="form-check-label" for="Autohold"> Autohold </label>
                    </div><br/>
                    <?php } ?>
                    <?php if($result->Memory_paket==1)
                    {
                      ?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Memory_paket" name="Memory_paket" checked value="1">
                    <label class="form-check-label" for="Memory_paket"> Memory paket </label>
                    </div>
                    
                    <?php } else {?>
                    <div class="form-check form-check-inline">
                    <input type="checkbox"  class="form-check-input" id="Memory_paket" name="Memory_paket" value="1">
                    <label class="form-check-label" for="Memory_paket"> Memory paket </label>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-12">
                <label for="Detailed_information">Əlavə məlumat(Detailed information)</label>
                <textarea class="form-control rounded-0" id="Detai vled_information" name="Detailed_information" rows="5" value="<?php echo htmlentities($result->VehiclesOverview);?>"><?php echo htmlentities($result->VehiclesOverview);?></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary col-lg-2" style="height:35px">SUBMIT</button>
            </form>
        </div>
      </div>
    </section>
<!-- /Resent Cat --> 
<?php }} ?>

<?php } ?>
</div>


<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
