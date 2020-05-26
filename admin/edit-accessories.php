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
		$fileNames = array();
		for ($i=1; $i < 4; $i++) { 
			$fileNames[]=$_FILES["img".$i]["name"];
			// if($_FILES["img".$i]["name"] != "") {
				// $fileNames[]=$_FILES["img".$i]["name"];
				move_uploaded_file($_FILES["img".$i]["tmp_name"],"img/accessories/".$_FILES["img".$i]["name"]);	
			//}
		}
		$year=$_POST['year'];
		$make=$_POST['make'];
		$model=$_POST['model'];
		$trim=$_POST['trim'];
		$price=$_POST['price'];
		$sql="UPDATE  tblaccessories SET AccessoriesTitle=:AccessoriesTitle,AccessoriesOverview=:AccessoriesOverview,price=$price,year=$year,make=$make,model=$model,trim=$trim ";
		// $sql="UPDATE  tblaccessories SET AccessoriesTitle='AccessoriesTitle,AccessoriesOverview=:AccessoriesOverview,price=:price,year=:year,make=:make,model=:model,trim=:trim ";
		
		foreach ($fileNames as $key => $filename) {
			$temp = "";
			if($filename == "") {
				continue;
			}
			if($key==0){
				$temp=", Accessorieimage" . "='$filename' ";
			} else {
				$temp = ", Accessorieimage". ($key) . "='$filename' ";
			}
			$sql .= $temp;
		}
		$sql .= " WHERE id=:id";

		$AccessoriesTitle = $_POST["AccessoriesTitle"];
		$AccessoriesOverview=$_POST['AccessoriesOverview'];
		
		$id=$_GET['id'];

		$query = $dbh->prepare($sql);
		$query->bindParam(':AccessoriesTitle',$AccessoriesTitle,PDO::PARAM_STR);
		$query->bindParam(':AccessoriesOverview',$AccessoriesOverview,PDO::PARAM_STR);
		// $query->bindParam(':price',$price,PDO::PARAM_STR);
		// $query->bindParam(':year',$year,PDO::PARAM_STR);
		// $query->bindParam(':make',$make,PDO::PARAM_STR);
		// $query->bindParam(':model',$model,PDO::PARAM_STR);
		// $query->bindParam(':trim',$trim,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->execute();
		$msg="Accessories updted successfully";
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
	
	<title>Car Rental Portal | Admin Create Accessories</title>

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
					
						<h2 class="page-title">Update Accessories</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" enctype="multipart/form-data" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

					<?php	
					$id = $_GET['id'];
					$ret = "SELECT
					`tblaccessories`.`AccessoriesTitle`,`tblaccessories`.`AccessoriesOverview`,`tblaccessories`.`Accessorieimage`,`tblaccessories`.`Accessorieimage1`,`tblaccessories`.`Accessorieimage2`,`tblaccessories`.`price`
					,`tblyear`.`year`,`tblyear`.`id` AS yearid,`tblbrands`.`name` AS make,`tblbrands`.`id` AS makeid,`tblmodel`.`name` AS model,`tblmodel`.`id` AS modelid,`tbltrims`.`name` AS trim,`tbltrims`.`id` AS trimid
					
				  FROM
					`carrental`.`tblaccessories`
					LEFT JOIN `carrental`.`tblyear`
					  ON (
						`tblaccessories`.`year` = `tblyear`.`id`
					  )
					  LEFT JOIN `carrental`.`tblbrands`
					  ON (
						`tblaccessories`.`make` = `tblbrands`.`id`
					  )
					  LEFT JOIN `carrental`.`tbltrims`
					  ON (
						`tblaccessories`.`trim` = `tbltrims`.`id`
					  )
					  LEFT JOIN `carrental`.`tblmodel`
					  ON (
						`tblaccessories`.`model` = `tblmodel`.`id`
					  ) WHERE `tblaccessories`.`id`=:id";
					$query = $dbh -> prepare($ret);
					$query->bindParam(':id',$id, PDO::PARAM_STR);
					$query-> execute();
					$results = $query -> fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if($query -> rowCount() > 0)
					{
					foreach($results as $result)
					{
					?>
											 <div class="form-row">
												<div class="form-group  col-md-6">
												<label class="mdb-main-label" >Year</label>
												<select class=" md-form form-control col-md-12" editable="true" name="year" searchable="Search and add here..." >
													<option  value="<?php echo htmlentities($result->yearid);?>" selected><?php echo htmlentities($result->year);?></option>
													<?php
													$sql = "SELECT * FROM `tblyear` ORDER BY year desc ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results1=$query->fetchAll(PDO::FETCH_OBJ);
													if($query->rowCount() > 0) 
													{
														foreach($results1 as $result1) {
															if($result->year!=$result1->year){
														echo '<option value="'. $result1->id .'">' . $result1->year . '</option>';
															}
														}
													}
													?>
												</select>
												</div>
												<div class="form-group  col-md-6">
												<label class="mdb-main-label" >Make</label>
												<select class=" md-form form-control col-md-12" editable="true" name="make" searchable="Search and add here..." >
													<option  value="<?php echo htmlentities($result->makeid);?>" selected><?php echo htmlentities($result->make);?></option>
													<?php
													$sql = "SELECT * FROM `tblbrands` ORDER BY name ASC ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results2=$query->fetchAll(PDO::FETCH_OBJ);
													if($query->rowCount() > 0) 
													{
														foreach($results2 as $result2) {
															if($result->make!=$result2->name){
																echo '<option value="'. $result2->id .'">' . $result2->name . '</option>';
															}
															}
													}
													?>
												</select>
												</div>
												<div class="form-group  col-md-6">
												<label class="mdb-main-label" >Model</label>
												<select class=" md-form form-control col-md-12" editable="true" name="model" searchable="Search and add here..." >
													<option  value="<?php echo htmlentities($result->modelid);?>" selected><?php echo htmlentities($result->model);?></option>
													<?php
													$sql = "SELECT * FROM `tblmodel` ORDER BY name ASC ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results3=$query->fetchAll(PDO::FETCH_OBJ);
													if($query->rowCount() > 0) 
													{
														foreach($results3 as $result3) {
															if($result->model!=$result3->name){
																echo '<option value="'. $result3->id .'">' . $result3->name . '</option>';
																}
															}
													}
													?>
												</select>
												</div>
												<div class="form-group  col-md-6">
												<label class="mdb-main-label" >Trim</label>
												<select class=" md-form form-control col-md-12" editable="true" name="trim" searchable="Search and add here..." >
													<option  value="<?php echo htmlentities($result->trimid);?>" selected><?php echo htmlentities($result->trim);?></option>
													<?php
													$sql = "SELECT * FROM `tbltrims` ORDER BY name ASC ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results4=$query->fetchAll(PDO::FETCH_OBJ);
													if($query->rowCount() > 0) 
													{
														foreach($results4 as $result4) {
															if($result->trim!=$result4->name){
																echo '<option value="'. $result4->id .'">' . $result4->name . '</option>';
																}
															}
													}
													?>
												</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="mdb-main-label">Accessory Title</label>
													<div class="col-sm-12">
														<input type="text" class="form-control" value="<?php echo htmlentities($result->AccessoriesTitle);?>" name="AccessoriesTitle" required>
													</div>
												</div>
												<div class="hr-dashed"></div>
												<div class="form-group col-md-6">
													<label class="mdb-main-label">Price </label>
													<div class="col-sm-12">
														<input type="text" class="form-control" value="<?php echo htmlentities($result->price);?>" name="price" required>
													</div>
												</div>
											</div>
											<div class="form-group col-md-12">
                                                    <label class="mdb-main-label">Accessory Overview<span style="color:red">*</span></label>
                                                    <div class="col-sm-12">
                                                    <textarea class="form-control" name="AccessoriesOverview" value="<?php echo htmlentities($result->AccessoriesOverview);?>" rows="3" required><?php echo htmlentities($result->AccessoriesOverview);?></textarea>
                                                    </div>
                                                </div>
										<?php }} ?>
											<div class="form-group">
												<div class="col-sm-12">
													<h4><b>Upload Image</b></h4>
												</div>
												<div class="col-sm-4">
													<img src="img/accessories/<?php echo htmlentities($result->Accessorieimage);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  									<label for="img1">IMG1</label>
													<input type="file" id="img1"  name="img1" placeholder="file1">
												</div>
												<div class="col-sm-4">
													<img src="img/accessories/<?php echo htmlentities($result->Accessorieimage1);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  									<label for="img2">IMG2</label>
													<input type="file" id="img2" name="img2" placeholder="file2">
												</div>
												<div class="col-sm-4">
													<img src="img/accessories/<?php echo htmlentities($result->Accessorieimage2);?>" class="col-lg-12" height="200" style="border:solid 0px #000">
                  									<label for="img3">IMG3</label>
													<input type="file" id="img3"  name="img3" placeholder="file3">
												</div>
                                            </div>
											
											<div class="form-group">
												<div class="col-sm-2 col-sm-offset-10">
													<button class="btn btn-primary" name="submit" type="submit">Update</button>
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