<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

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
	
	<title>Car Rental Portal | View Proposer </title>

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
	#proposer{
		margin-left: 25px;
	}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div id="proposer">
					<h1>View Proposer </h1>
					<hr>
					<div class="row">
						<!-- Card -->
						<?php
							$sql="SELECT t.surname as Tsurname, t.phone as Tphone, t.price as Tprice, t1.* FROM `tblgiveofferprice` AS t LEFT JOIN `tblvehicles` AS t1 ON t.vehicle_id = t1.id where t.id=:id";
							$query = $dbh->prepare($sql);
							$query->bindParam(':id',$_GET["id"],PDO::PARAM_STR);
							$query->execute();
							$results = $query->fetchAll(PDO::FETCH_OBJ);
							$result = $results[0];
							echo '<div class="col-lg-12">
								<div class="card">
									<!-- Card image -->
									<h4 class="card-title"><a>Surname: '.$result->Tsurname.'</a></h4>
									<h4 class="card-title"><a>Phone: '.$result->Tphone.'</a></h4>
									<h4 class="card-title"><a>Price: '.$result->Tprice.'</a></h4>
									<hr/>
									<h4 class="card-title"><a>Car name: '.$result->VehiclesTitle.'</a></h4>
									<div class="row">	
										<div class="col-lg-3 col-md-3">
											<img class="card-img-top"
												src="img/vehicleimages/'.$result->Vimage1.'" alt="Vehicles Image1">
										</div>
										<div class="col-lg-3 col-md-3">
											<img class="card-img-top"
												src="img/vehicleimages/'.$result->Vimage2.'" alt="Vehicles Image2">
										</div>
										<div class="col-lg-3 col-md-3">
											<img class="card-img-top"
												src="img/vehicleimages/'.$result->Vimage3.'" alt="Vehicles Image3">
										</div>
										<div class="col-lg-3 col-md-3">
											<img class="card-img-top"
												src="img/vehicleimages/'.$result->Vimage4.'" alt="Vehicles Image4">
										</div>
									</div>
									

									<!-- Card content -->
									<div class="card-body">
									<!-- Title -->
										<h4 class="card-title"><a>Car name: '.$result->VehiclesTitle.'</a></h4>

									<!-- Text -->
									<div >';
								?>
										
									<div class="row">
										<div class="col-sm-3">
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="ParkingSensor" name="ParkingSensor" <?php if($result->ParkingSensor == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="ParkingSensor">Park sensoru</label>
											</div>
											<!-- Material inline 2 -->
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="seat_heating" name="seat_heating" <?php if($result->seat_heating == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="seat_heating">Oturacaqların istidilməsi </label>
											</div>
											<!-- Material inline 3 -->
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="ventilation" name="ventilation" <?php if($result->ventilation == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="ventilation">Oturacaqların ventilyasası</label>
											</div>
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="ABS" name="ABS"  <?php if($result->ABS == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="ABS">ABS</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="dont_closed_centeral" name="dont_closed_centeral" <?php if($result->dont_closed_centeral == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="dont_closed_centeral">Mərkəzi qapanma</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Conditioners" name="Conditioners" <?php if($result->Conditioners == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Conditioners">Kondisioner</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Rear_view_camera" name="Rear_view_camera" <?php if($result->Rear_view_camera == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Rear_view_camera">Arxa görüntü kamerası</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="luke" name="luke" <?php if($result->luke == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="luke">Lyuk (Luke)</label><br>
											</div>
										
										</div>
										<div class="col-sm-3">
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="Rain_Sensor" name="Rain_Sensor" <?php if($result->Rain_Sensor == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="Rain_Sensor">Yağış Sensoru</label>
											</div>
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="Climate_control" name="Climate_control" <?php if($result->Climate_control == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="Climate_control">Klimat kontrol</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Cruise_control" name="Cruise_control" <?php if($result->Cruise_control == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Cruise_control">Kruze kontrol</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Start_stop" name="Start_stop" <?php if($result->Start_stop == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Start_stop">Start – stop</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Monitor" name="Monitor" <?php if($result->Monitor == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Monitor">Monitor</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Autopilot" name="Autopilot" <?php if($result->Autopilot == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Autopilot">Avtopilot</label>
											</div>
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="Autohold" name="Autohold" <?php if($result->Autohold == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="Autohold">Avtohold</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="checkbox" class="form-check-input" id="Memory_paket" name="Memory_paket"  <?php if($result->Memory_paket == 1) echo htmlentities('checked');?>>
												<label class="form-check-label" for="Memory_paket">Memory paket</label>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-check form-check-inline">
											<input type="checkbox" class="form-check-input" id="Chrome_package" name="Chrome_package"  <?php if($result->Chrome_package == 1) echo htmlentities('checked');?>>
											<label class="form-check-label" for="Chrome_package">Chrome package</label>
											</div>
										</div>
										<hr/>
										<br>
										<div class="row">
											<div class="form-group">
												<label for="Detailed_information">Əlavə məlumat(Detailed information)</label>
												<textarea class="form-control rounded-0" id="Detailed_information" name="Detailed_information" rows="4" readonly="true"><?php echo htmlentities($result->VehiclesOverview);?></textarea>
											</div>
										</div>
									</div>
								<?php	?>
									</div>
								</div>
							</div>
						<!-- Card -->
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
<?php } ?>