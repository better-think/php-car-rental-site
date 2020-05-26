<?php
session_start();
error_reporting(0);
include('includes/config.php');
if( strlen($_SESSION['alogin']) == 0 ) {	
    header('location:index.php');
}
else { 
    if(isset($_POST['submit'])) {
        $accessorytitle=$_POST['accessorytitle'];
        $price=$_POST['accessoryprice'];
        $accessorytitleview=$_POST['accessorytitleview'];
        $accessoryimage=$_FILES["img"]["name"];

        move_uploaded_file($_FILES["img"]["tmp_name"],"img/accessories/".$_FILES["img"]["name"]);
        $accessoryimage1=$_FILES["img1"]["name"];
        move_uploaded_file($_FILES["img1"]["tmp_name"],"img/accessories/".$_FILES["img1"]["name"]);
        $accessoryimage2=$_FILES["img2"]["name"];
        move_uploaded_file($_FILES["img2"]["tmp_name"],"img/accessories/".$_FILES["img2"]["name"]);

        $sql="INSERT INTO tblaccessories(AccessoriesTitle,price,AccessoriesOverview,Accessorieimage,Accessorieimage1,Accessorieimage2,year,make,model,trim) 
                VALUES(:accessorytitle,:price,:accessorytitleview,:accessoryimage,:accessoryimage1,:accessoryimage2,:year,:make,:model,:trim)";
        $query = $dbh->prepare($sql);
        $year = $_GET['year'];
        $make = $_GET['make'];
        $model = $_GET['model'];
        $trim = $_GET['trim'];
        $query->bindParam(':accessorytitle',$accessorytitle,PDO::PARAM_STR);
        $query->bindParam(':price',$price,PDO::PARAM_STR);
        $query->bindParam(':year',$year, PDO::PARAM_STR);
		$query->bindParam(':make',$make, PDO::PARAM_STR);
		$query->bindParam(':model',$model, PDO::PARAM_STR);
		$query->bindParam(':trim',$trim, PDO::PARAM_STR);
        $query->bindParam(':accessorytitleview',$accessorytitleview,PDO::PARAM_STR);
        $query->bindParam(':accessoryimage',$accessoryimage,PDO::PARAM_STR);
        $query->bindParam(':accessoryimage1',$accessoryimage1,PDO::PARAM_STR);
        $query->bindParam(':accessoryimage2',$accessoryimage2,PDO::PARAM_STR);
        // $query->execute();
        // $lastInsertId = $dbh->lastInsertId();
        if($query->execute()){
            $msg="Accessory posted successfully";
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

        <link href="../assets/MDB/css/mdb.css" rel="stylesheet">
        <link href="../assets/MDB/css/bootstrap.css" rel="stylesheet">
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
            div.tabs-wrapper > ul.nav.tabs-primary{
                line-height: 2px;
                height: 75px;
            }
                div.tabs-wrapper > ul.nav.tabs-primary > li {
                    height: 75px;
                }
                    div.tabs-wrapper > ul.nav.tabs-primary > li > a {
                        height: 73px;
                    }
                        div.tabs-wrapper > ul.nav.tabs-primary > li > a > h3 {
                            margin-top: 0px;
                        }
                        .classic-tabs .nav li a:not(.active) {
                            margin-bottom: 0px;
                        }
        </style>
        <link href="../assets/css/accessory-search.css" rel="stylesheet"></link>
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
                        <div class="col-12 col-xl-12">
                            <div class="row" style="margin-left: 1%;">
                                <h2 class="font-weight-bold">Post Accessory</h2>
                            </div>
                            <!-- Classic tabs -->
                            <div class="classic-tabs">

                                <!-- Nav tabs -->
                                <div class="tabs-wrapper">
                                    <ul class="nav tabs-primary" style = "line-height:2px" role="tablist">
                                        <li class="nav-item active" id="navli">
                                            <a id="accessory-year" class="nav-link waves-light waves-effect waves-light active" data-toggle="tab" href="#panel83" role="tab" aria-selected="true">
                                                <!-- <i class="fas fa-heart fa-2x" aria-hidden="true"></i> -->
                                                <br><h3 class="white-text"> YEAR</h1>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="navli">
                                            <a id="accessory-make" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel84" role="tab">
                                                <!-- <i class="fas fa-heart fa-2x" aria-hidden="true"></i> -->
                                                <br><h3 class="white-text"> MAKE</h1>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="navli">
                                            <a id="accessory-model" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel85" role="tab" >
                                                <!-- <i class="fas fa-envelope fa-2x" aria-hidden="true"></i> -->
                                                <br><h3 class="white-text"> MODEL</h1>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="navli">
                                            <a id="accessory-trim" class="nav-link waves-light waves-effect waves-light disabled" data-toggle="tab" href="#panel86" role="tab">
                                                <!-- <i class="fas fa-star fa-2x" aria-hidden="true"></i> -->
                                                <br><h3 class="white-text"> TRIM</h1>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 1-->
                                    <?php
                                        if($_GET['year'] != "") {
                                    ?>
                                    <div class="tab-pane" id="panel83" role="tabpanel">
                                        <?php
                                            $sql="SELECT * FROM `tblyear`";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                            if(count($results) > 0){
                                            $i = 0;
                                            foreach($results as $result){
                                                $i++;
                                                ?>
                                                <button class="btn btn-outline-info waves-effect" onclick="getMakeForAccesory(<?php echo htmlentities($result->id);?>)" value = "<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->year);?></button>
                                                <?php
                                            }
                                            }
                                        ?>
                                    </div>
                                    <?php }
                                        else {

                                        ?>
                                        <div class="tab-pane active" id="panel83" role="tabpanel">
                                        <?php
                                            $sql="SELECT * FROM `tblyear`";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                            if(count($results) > 0){
                                            $i = 0;
                                            foreach($results as $result){
                                                $i++;
                                                ?>
                                                <button class="btn btn-outline-info waves-effect" onclick="getMakeForAccesory(<?php echo htmlentities($result->id);?>)" value = "<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->year);?></button>
                                                <?php
                                            }
                                            }
                                        ?>
                                    </div>

                                        <?php } ?>
                                    <!--/.Panel 1-->
                                    <!--Panel 2-->
                                    <div class="tab-pane" id="panel84" role="tabpanel">
                                    </div>
                                    <!--/.Panel 2-->
                                    <!--Panel 3-->
                                    <div class="tab-pane" id="panel85" role="tabpanel">
                                    </div>
                                    <!--/.Panel 3-->
                                    <!--Panel 4-->
                                    <div class="tab-pane" id="panel86" role="tabpanel">
                                    </div>
                                    <!--/.Panel 4-->
                                </div>
                            </div>
                        <!-- Classic tabs -->
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="row" id = "show_Accessory">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <?php if($error){
                                            ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                        else if($msg){
                                            ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                        <div class="panel-body">
                                            <!-- form start -->
                                            <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return valid();">
                                                <div class="form-group">
                                                        <label class="col-sm-2 control-label">Accessory Title<span style="color:red">*</span>
                                                        </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="accessorytitle" class="form-control" required>
                                                    </div>
                                                    <div class="col-sm-4">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-sm-2 control-label">Price<span style="color:red">*</span>
                                                        </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="accessoryprice" class="form-control" required>
                                                    </div>
                                                    <div class="col-sm-4">
                                                    </div>
                                                </div>
                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Accessory Overview<span style="color:red">*</span></label>
                                                    <div class="col-sm-10">
                                                    <textarea class="form-control" name="accessorytitleview" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="hr-dashed"></div>
                                                    <div class = "col-lg-4">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <h4><b>Upload Image</b></h4>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                            Image<span style="color:red">*</span><input type="file" name="img" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-4">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <h4><b>Upload Image1</b></h4>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                            Image1<span style="color:red">*</span><input type="file" name="img1" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-4">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <h4><b>Upload Image2</b></h4>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-4">
                                                            Image2<span style="color:red">*</span><input type="file" name="img2" required>
                                                            </div>
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
        <script src="js/main.js">
        </script>
        <script>
            $("#accessory-year").click(function() {
                if(location.search.split("&").length > 0) {
                    location.search = "";
                }
            })
            function show_Accessory(year,make,model,trim){
                $("#show_Accessory").show();
                year = year;
                make = make;
                model = model;
                trim = trim;
                location.search = "?year=" + year + "&make=" + make + "&model=" + model + "&trim="+ trim;
            }
        </script>
    </body>
  <script src="../assets/js/accessory-search.js"> </script> 
  <script src="../assets/MDB/js/mdb.js"></script>

</html>
<?php } ?>