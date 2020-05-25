<?php
session_start();
error_reporting(0);
include('includes/config.php');
if( strlen($_SESSION['alogin']) == 0 ) {	
    header('location:index.php');
}
else {
    if( isset($_POST['submit']) ) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        if( isset($_GET['id']) ) {
            $id=$_GET['id'];
            $sql = "UPDATE `tblquestion` SET NAME = :name, surname = :surname, question = :question WHERE id = :id ";
            $query = $dbh->prepare($sql);
            $query -> bindParam(':id',$id, PDO::PARAM_STR);
            $query -> bindParam(':name',$name, PDO::PARAM_STR);
            $query -> bindParam(':surname',$surname, PDO::PARAM_STR);
            $query -> bindParam(':question',$question, PDO::PARAM_STR);
            $query -> execute();
            $msg="Page data updated successfully!";
        } else if ( isset($_GET['answer-id']) ) {
            $id=$_GET['answer-id'];
            $sql = "UPDATE `tblanswer` SET NAME = :name, surname = :surname, answer = :answer WHERE id = :id ";
            $query = $dbh->prepare($sql);
            $query -> bindParam(':id',$id, PDO::PARAM_STR);
            $query -> bindParam(':name',$name, PDO::PARAM_STR);
            $query -> bindParam(':surname',$surname, PDO::PARAM_STR);
            $query -> bindParam(':answer',$answer, PDO::PARAM_STR);
            $query -> execute();
            $msg="Page data updated successfully!";
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
	
    <title>Car Rental Portal | Admin Change 
        <?php if ( isset($_GET['id']) ) { ?> Question 
        <?php } else {?>Answer 
        <?php }?>
    </title>

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
					
						<h2 class="page-title">Change 
                        <?php if ( isset($_GET['id']) ) { ?> Question 
                        <?php } else {?>Answer 
                        <?php }?>
                        </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">
                                    <?php if ( isset($_GET['id']) ) { ?> Question 
                                    <?php } else {?>Answer 
                                    <?php }?>
                                    </h2>
                                    </div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" enctype="multipart/form-data" onSubmit="return valid();">
                                            <?php if($error){?>
                                                <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> 
                                            </div><?php } else if($msg){?>
                                            <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                            <?php 
                                            $id = $_GET['id'];
                                            $answer_id = $_GET['answer-id'];
                                            if ( isset($id) ) {
                                                $sql ="SELECT * from tblquestion where id=:id";
                                                $query = $dbh -> prepare($sql);
                                                $query-> bindParam(':id', $id, PDO::PARAM_STR);
                                            } else {
                                                $sql ="SELECT * from tblanswer where id=:id";
                                                $query = $dbh -> prepare($sql);
                                                $query-> bindParam(':id', $answer_id, PDO::PARAM_STR);
                                            }
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {	?>
                                        
                                            <div class="form-group">
												<label class="col-sm-2 control-label">Name</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="name" id="name" required
                                                    value = "<?php echo htmlentities($result->name); ?> ">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Surname</label>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="surname" id="surname" 
                                                    value = "<?php echo htmlentities($result->surname); ?> ">
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-2 control-label">
                                                <?php if ( isset($_GET['id']) ) { ?> Question 
                                                <?php } else {?>Answer 
                                                <?php }?>
                                                </h2>
                                                </label>
                                                <div class="col-sm-10">
                                                <?php if ( isset($_GET['id']) ) { ?> 
                                                    <textarea class="form-control" name="question" rows="3"id="question" required
                                                    value = "<?php echo htmlentities($result->question); ?>"><?php echo htmlentities($result->question); ?></textarea>
                                                <?php } else {?>
                                                    <textarea class="form-control" name="answer" rows="3"id="answer" required
                                                    value = "<?php echo htmlentities($result->answer); ?>"><?php echo htmlentities($result->answer); ?></textarea>
                                                <?php }?>
                                                </h2>
                                                </div>
											</div>
											<div class="hr-dashed"></div>
                                            <?php 
                                            }
                                            }?>
                                            <?php ?>
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
