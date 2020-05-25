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
    $brand = $_POST['brand'];

		$sql="INSERT INTO tblvehicles (name,surename,phone, 
			email,model,category, engine_power, color, origin_country, horse_power,
			top_speed, mileage, ModelYear, fuel_consumption, fuel_tank_capacity, FuelType,
			transmission, SeatingCapacity, ParkingSensor,seat_heating, ventilation, ABS, dont_closed_centeral, 
			Conditioners, Rear_view_camera, luke, Rain_Sensor, Climate_control, Cruise_control, Start_stop,
      Monitor, Autopilot, Autohold, Memory_paket, Chrome_package, VehiclesOverview, Vimage1, Vimage2, Vimage3,
      Vimage4, Vimage5, Vimage6, Vimage7, Vimage8, Vimage9, Vimage10, type, VehiclesTitle, brand) 
			VALUES(:name, :surename, :phone, 
			:email, :model, :category, :engine_power, :color, :origin_country, :horse_power,
			:top_speed, :mileage, :ModelYear, :fuel_consumption, :fuel_tank_capacity, :FuelType,
			:gear_box, :SeatingCapacity, :ParkingSensor,:seat_heating, :ventilation, :ABS, :dont_closed_centeral, 
			:Conditioners, :Rear_view_camera, :luke, :Rain_Sensor, :Climate_control, :Cruise_control, :Start_stop,
      :Monitor, :Autopilot, :Autohold, :Memory_paket, :Chrome_package, :Detailed_information, :vimage1, :vimage2,
       :vimage3, :vimage4,
      :vimage5, :vimage6, :vimage7, :vimage8, :vimage9, :vimage10, 'sell', :VehiclesTitle, :brand)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':VehiclesTitle', $VehiclesTitle, PDO::PARAM_STR);
    $query->bindParam(':brand', $brand, PDO::PARAM_STR);
    
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
      move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
      move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
      move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
      move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
      move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);
      move_uploaded_file($_FILES["img6"]["tmp_name"],"img/vehicleimages/".$_FILES["img6"]["name"]);
      move_uploaded_file($_FILES["img7"]["tmp_name"],"img/vehicleimages/".$_FILES["img7"]["name"]);
      move_uploaded_file($_FILES["img8"]["tmp_name"],"img/vehicleimages/".$_FILES["img8"]["name"]);
      move_uploaded_file($_FILES["img9"]["tmp_name"],"img/vehicleimages/".$_FILES["img9"]["name"]);
      move_uploaded_file($_FILES["img10"]["tmp_name"],"img/vehicleimages/".$_FILES["img10"]["name"]);
  
  
		}
		else 
		{
			$error = "Something went wrong. Please try again";
		}
  }
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
		
		<title>Car Rental Portal | Admin Post Vehicle</title>
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
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">
						
							<h2 class="page-title">Post A Vehicle</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
										<?php if($error){?>
										<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label" for="name">AD<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="name" name="name" placeholder="name" required>		
													</div>
													<label class="col-sm-2 control-label" for="surename">Soyad<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="surename" name="surename" placeholder="surename" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label" for="phone">Telefon<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="phone" name="phone" placeholder="35102340123" required>
													</div>
													<label class="col-sm-2 control-label" for="email">e-mail<span style="color:red">*</span></label>
													<div class="col-sm-4">	
														<input type="email" class="form-control" id="email" name="email" placeholder="tom@gmail.com0" required>
													</div>
												</div>											
												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label" for="Detailed_information">Əlavə məlumat(Detailed information)<span style="color:red">*</span></label>
													<div class="col-sm-10">
														<textarea class="form-control rounded-10" id="Detailed_information" name="Detailed_information" rows="4"></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label" for="VehiclesTitle">Vehicles Title<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="VehiclesTitle" class="form-control" id="VehiclesTitle" name="VehiclesTitle" placeholder="..." required>
													</div>
													<label class="col-sm-2 control-label" >Brand Name<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="brand" searchable="Search and add here..." required>
															<option value="" disabled selected>Brand Name</option>
															<?php
															$sql = "SELECT * FROM `tblbrands` ORDER BY name ASC ";
															$query = $dbh -> prepare($sql);
															$query->execute();
															$results=$query->fetchAll(PDO::FETCH_OBJ);
															if($query->rowCount() > 0) 
															{
																foreach($results as $result) {
																echo '<option value="'. $result->id .'">' . $result->name . '</option>';
																}
															}
															?>
														</select>
													</div>
													
												</div>


												<div class="form-group">
													<label class="col-sm-2 control-label" >Model<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker"  name="model" searchable="Search and add here..." required>
															<option value="" disabled selected>Model</option>
															<?php
															$sql = "SELECT * FROM `tblmodel` ORDER BY name ASC ";
															$query = $dbh -> prepare($sql);
															$query->execute();
															$results=$query->fetchAll(PDO::FETCH_OBJ);
															if($query->rowCount() > 0) 
															{
																foreach($results as $result) {
																echo '<option value="'. $result->id .'">' . $result->name . '</option>';
																}
															}
															?>
														</select>
													</div>
													<label class="col-sm-2 control-label"for="category">Kateqorya (Category)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="category" name="category" placeholder="category" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"for="engine_power">Mator gücü(Eng.Power)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="engine_power" name="engine_power" placeholder="230" required>
														<span>Kw</span>
													</div>
													<label class="col-sm-2 control-label"for="color">Rəngi (Color)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="color" name="color" placeholder="red" required>
													</div>


												</div>

																			

												<div class="form-group">
													<label class="col-sm-2 control-label"for="Horsepower">At gücü (Horsepower)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="Horsepower" name="horse_power" placeholder="250" required>
														<span>PH</span>
													</div>
													<label class="col-sm-2 control-label"for="top_speed">Maksimal surət (Top speed)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="top_speed" name="top_speed" placeholder="120" required>Km/h
													</div>
												</div>
												<div class="hr-dashed"></div>
												<!--  -->
												<div class="form-group ">
													<label class="col-sm-2 control-label"for="Mileage">Kilometraj (Mileage)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="Mileage" name="mileage" placeholder="1234" required>
														<span> mileage</span>
													</div>
													<label class="col-sm-2 control-label"for="year">İli (Year)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="year" name="year" placeholder="2021" required>
													</div>
												</div>
												<div class="form-group ">
													<label class="col-sm-2 control-label"for="fule_consup">Yanacaq sərfiyyat(Fuel consup)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="fule_consup" name="fuel_consumption" placeholder="11" required>
														<span>L<span>
													</div>
													<label class="col-sm-2 control-label"for="fuel_tank_capacity">Yanacaq çəninin həcmi(Fuel tank capacity)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="fuel_tank_capacity" name="fuel_tank_capacity" placeholder="11" required>L
													</div>
												</div>
												<!--  -->
												<div class="form-group">
													<label class="col-sm-2 control-label">Fuel Type<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker"  name="fuel_type" searchable="Search and add here..." required>
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
													</div>
													<label class="col-sm-2 control-label">Sürət qutusu (Transmission/Gear Box)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker"  name="gear_box" searchable="Search and add here..." required>
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
																echo '<option value="'. $result->id .'">' . $result->name . '</option>';
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label" for="numberofSeat">Oturacaq sayı (Number of seat)<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="numberofSeat" name="SeatingCapacity" placeholder="4" required>
													</div>
													<label for="origin_country"class="col-sm-2 control-label">Mənşə ölkəsi<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" class="form-control" id="origin_country" name="origin_country" placeholder="Origin Count" required>
													</div>
												</div>
																			



												<div class="form-group">
													<div class="col-sm-12">
													<h4><b>Upload Images</b></h4>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 1 <span style="color:red">*</span>
														<!-- <input type="file" name="img1" required> -->
														<input type="file"  id="img1" name="img1" placeholder="file1" required >
													</div>
													<div class="col-sm-4">
														Image 2<span style="color:red">*</span>
														<!-- <input type="file" name="img2" required> -->
														<input type="file" class="form-control" id="img2" name="img2" placeholder="file2" required>
													</div>
													<div class="col-sm-4">
														Image 3<span style="color:red">*</span>
														<input type="file" class="form-control" id="img3" name="img3" placeholder="file3" required>
														<!-- <input type="file" name="img3" required> -->
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 4<span style="color:red">*</span>
														<input type="file" class="form-control" id="img4" name="img4" placeholder="file4" >
													</div>
													<div class="col-sm-4">
														Image 5<span style="color:red">*</span>
														<input type="file" class="form-control" id="img5" name="img5" placeholder="file5">
													</div>
													<div class="col-sm-4">
														Image 6<span style="color:red">*</span>
														<input type="file" class="form-control" id="img6" name="img6" placeholder="file6">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														Image 7<span style="color:red">*</span>
														<input type="file" class="form-control" id="img7" name="img7" placeholder="file7">
													</div>
													<div class="col-sm-4">
														Image 8<span style="color:red">*</span>
														<input type="file" class="form-control" id="img8" name="img8" placeholder="file8">
													</div>
													<div class="col-sm-4">
														Image 9<span style="color:red">*</span>
														<input type="file" class="form-control" id="img9" name="img9" placeholder="file9">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														Image 10
														<input type="file" class="form-control" id="img10" name="img10" placeholder="file10">
													</div>
												</div>
																			
												<div class="hr-dashed"></div>									
														

												<div class="row">
													<div class="col-md-12">
														<div class="panel panel-default">
															<div class="panel-heading">Accessories</div>
																<div class="panel-body">
																	<div class="form-group">
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="ParkingSensor" name="ParkingSensor" value="1">
																				<label  for="ParkingSensor">Park sensoru</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="dont_closed_centeral" name="dont_closed_centeral" value="1">
																				<label for="dont_closed_centeral">Mərkəzi qapanma</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox"  id="Rain_Sensor" name="Rain_Sensor" value="1">
																				<label for="Rain_Sensor">Yağış Sensoru</label>
																			</div>
																		</div>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox"  id="Monitor" name="Monitor" value="1">
																			<label for="Monitor">Monitor</label>
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox"  id="seat_heating" name="seat_heating" value="1">
																				<label for="seat_heating">Oturacaqların istidilməsi </label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox"  id="Conditioners" name="Conditioners" value="1">
																				<label for="Conditioners">Kondisioner</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="Climate_control" name="Climate_control" value="1">
																				<label for="Climate_control">Klimat kontrol</label>
																			</div>
																		</div>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox"  id="Autopilot" name="Autopilot" value="1">
																			<label  for="Autopilot">Avtopilot</label>
																		</div>
																	</div>


																	<div class="form-group">
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox" id="ventilation" name="ventilation" value="1">
																				<label for="ventilation">Oturacaqların ventilyasası</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox h checkbox-inline">
																				<input type="checkbox"  id="Rear_view_camera" name="Rear_view_camera" value="1">
																				<label  for="Rear_view_camera">Arxa görüntü kamerası</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class="checkbox checkbox-inline">
																				<input type="checkbox"   id="Cruise_control" name="Cruise_control" value="1">
																				<label   for="Cruise_control">Kruze kontrol</label>
																			</div>
																		</div>
																		<div class="checkbox checkbox-inline">
																			<input type="checkbox"   id="Autohold" name="Autohold" value="1">
																			<label   for="Autohold">Avtohold</label>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-sm-3">
																			<div class=" checkbox checkbox-inline">
																				<input type="checkbox"   id="Chrome_package" name="Chrome_package" value="1">
																				<label   for="Chrome_package">Chrome package</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class=" checkbox checkbox-inline">
																				<input type="checkbox"   id="ABS" name="ABS" value="1">
																				<label   for="ABS">ABS</label>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<div class=" checkbox checkbox-inline">
																				<input type="checkbox"   id="luke" name="luke" value="1">
																				<label   for="luke">Lyuk (Luke)</label><br>
																			</div>
																		</div>
																		<div class=" checkbox checkbox-inline">
																			<input type="checkbox"   id="Start_stop" name="Start_stop" value="1">
																			<label   for="Start_stop">Start – stop</label>
																		</div>
																		
																	</div>
																	<div class="form-group col-sm-3">
																		<div class=" checkbox checkbox-inline">
																			<input type="checkbox"   id="Memory_paket" name="Memory_paket" value="1">
																			<label   for="Memory_paket">Memory paket</label>
																		</div>
																	</div>
																	<!-- <div class="hr-dashed"></div> -->
																	<div class="form-group">
																		<div class="col-sm-8 col-sm-offset-2">
																			<button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
																		</div>
																	</div>

																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
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