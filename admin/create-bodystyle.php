<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$bsname=$_POST['bsname'];
$img=$_FILES["img"]["name"];
move_uploaded_file($_FILES["img"]["tmp_name"],"img/bodystyleimages/".$_FILES["img"]["name"]);

if(isset($_GET['id'])) {
	$date_array = gmdate("y-m-d H:i:s");
	$id=$_GET['id'];
	$sql = "UPDATE tblbody_style SET name = :name, filename = :filename, UpdationDate = :CurDate WHERE id=:id";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':id',$id, PDO::PARAM_STR);
	$query -> bindParam(':name',$bsname, PDO::PARAM_STR);
	$query -> bindParam(':filename',$img, PDO::PARAM_STR);
	$query -> bindParam(':CurDate',$date_array, PDO::PARAM_STR);
	$query -> execute();
	$msg="Page data updated  successfully";
} else {
		$sql="INSERT INTO  tblbody_style(name, filename) VALUES(:bsname,:img)";
		$sql1="INSERT INTO  tblbrands(BrandName) VALUES(:BrandName)";
		$query = $dbh->prepare($sql);
		$query1 = $dbh->prepare($sql);
		$query->bindParam(':bsname',$bsname,PDO::PARAM_STR);
		$query1->bindParam(':BrandName',$bsname,PDO::PARAM_STR);
		$query->bindParam(':img',$img,PDO::PARAM_STR);
		$query->execute();
		$query1->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId){
		$msg="BodyStyle Created successfully";
		}
		else {
		$error="Something went wrong. Please try again";
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
	
	<title>Car Rental Portal | Admin Create BodyStyle</title>

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
					
						<h2 class="page-title">Create BodyStyle</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" enctype="multipart/form-data" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">BodyStyle Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="bsname" id="bsname" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">BodyStyle Image</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="img" id="img" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
                                            <div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Submit</button>
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