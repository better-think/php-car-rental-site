<?php
session_start();
error_reporting(0);
include('includes/config.php');
if( strlen($_SESSION['alogin']) == 0 ) {	
    header('location:index.php');
}
else { 
    if(isset($_POST['submit'])) {
    $reviewtitle=$_POST['reviewtitle'];
    $reviewday=$_POST['reviewday'];
    $reviewimage=$_FILES["img1"]["name"];
    move_uploaded_file($_FILES["img1"]["tmp_name"],"img/review/".$_FILES["img1"]["name"]);
    $sql="INSERT INTO tblreview(ReviewTitle,ReviewDay,ReviewImage) 
        VALUES(:reviewtitle,:reviewday,:reviewimage)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':reviewtitle',$reviewtitle,PDO::PARAM_STR);
    $query->bindParam(':reviewday',$reviewday,PDO::PARAM_STR);
    $query->bindParam(':reviewimage',$reviewimage,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId){
        $msg="Review posted successfully";
    }
    else {
        $error="Something went wrong. Please try again";
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
        <!-- head panel-->
        <?php include('includes/header.php');?>
        <!-- all content panel-->
        <div class="ts-main-content">
            <!-- left panel -->
            <?php include('includes/leftbar.php');?>
            <!-- main panel start-->
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title">Post A Review</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Review</div>
                                        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="panel-body">
                                            <!-- form start -->
                                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                    <label class="col-sm-2 control-label">Review Title<span style="color:red">*</span></label>
                                                    <div class="col-sm-4">
                                                    <input type="text" name="reviewtitle" class="form-control" required>
                                                    </div>
                                                    <div class="col-sm-4">
                                                    </div>
                                                </div>
                                                <div class="hr-dashed"></div>
                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <h4><b>Upload Image</b></h4>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                    Image<span style="color:red">*</span><input type="file" class="form-control" name="img1" required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <div class="col-sm-8 col-sm-offset-4">
                                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main panel end-->
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