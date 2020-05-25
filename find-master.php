<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send'])) {
  $name=$_POST['name'];
  $surname=$_POST['surname'];
  $address=$_POST['address'];
  $workspace=$_POST['workspace'];
  $profficency=$_POST['profficency'];
  $ai=$_POST['ai'];
  $image=$_POST['image'];
  move_uploaded_file($_FILES["image"]["tmp_name"],"./assets/images/".$_FILES["image"]["name"]);
  $sql="INSERT INTO  tblfindmaster(name,surname,address,WorkSpace,profficency,AdditionalInformation,image) 
  VALUES(:name,:surname,:address,:workspace,:profficency,:ai,:image)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':surname',$surname,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':workspace',$workspace,PDO::PARAM_STR);
  $query->bindParam(':profficency',$profficency,PDO::PARAM_STR);
  $query->bindParam(':ai',$ai,PDO::PARAM_STR);
  $query->bindParam(':image',$image,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId) {
    $msg="You resigned successfully.";
  } else {
    $error="Something went wrong. Please try again";
  }

}
 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- CSS AND JAVASCRIPT START  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Car Rental Portal</title>
    
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
    <link href="assets/css/ImitatiedWithW3.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <style>
      .newPost {
        position: absolute;
        top: 8%;
        left: 0%;
        background-color: #4285f4a6;
        color: white;
        font-size: 16px;
        padding: 6px 30px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transform: rotate(-45deg);
      }
      .navbar {
        margin-bottom: 0px !important;
      }
    </style>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/lmitatiedWithBootstrap.min.css" type="text/css">
  <!-- CSS AND JAVASCRIPT END -->
</head>
<body>

 
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 



<!--Contact-us-->
<section class="contact_us section-padding">
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <h3>Registration</h3>
        <div class="contact_form gray-bg">
          <form  method="post">
            <div class = "row">
              <div class = "col-lg-6">
                <div class="form-group">
                  <label class="control-label">Name <span>*</span></label>
                  <input type="text" name="name" class="form-control white_bg" id="name"  >
                </div>
                <div class="form-group">
                  <label class="control-label">Surname <span>*</span></label>
                  <input type="text" name="surname" class="form-control white_bg" id="surname"  >
                </div>
                <div class="form-group">
                  <label class="control-label">Address <span>*</span></label>
                  <input type="text" name="address" class="form-control white_bg" id="address"  >
                </div>
              </div>
              <div class = "col-lg-6">
                <img src = "./assets/images/our_team_2.jpg" class="rounded-circle mr-3" height="250px" width="250px" alt="avatar">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label">Workspace <span>*</span></label>
                <select class="form-control white_bg"name="workspace">
                  <option>Select Brand</option>
                  <option value="1">Akkumulyator</option>
                  <option value="2">Dəmirçi</option>
                  <option value="3">Diaqnostika</option>
                  <option value="4">Eksertiza</option>
                  <option value="5">Forsunka</option>
                  <option value="6">Elektrik</option>
                  <option value="7">İnjektor</option>
                  <option value="8">Karbürator</option>
                  <option value="9">Razval</option>
                  <option value="10">Təkər təmiri</option>
                  <option value="11">Təkər Balansı</option>
                  <option value="12">Yağdəyişmə</option>
                  <option value="13">Moyka</option>
                </select>
              <a onclick = "show()">More Details...</a>
              <textarea style = "display:none" id = "more-details" class="form-control white_bg" name="profficency" rows="2"  ="" id="profficency"  ></textarea>
            </div>
            
            <div class="form-group">
              <label class="control-label">Additional Information <span>*</span></label>
              <textarea class="form-control white_bg" name="ai" rows="2"  ="" id="ai"  ></textarea>
              <!-- <input type="text" name="ai" class="form-control white_bg" id="ai"  > -->
            </div>
            <div class="form-group">
              <label class="control-label">Image<span>*</span></label>
              <input type="file" name="image" class="form-control white_bg" id="image"  >
            </div>
            <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit">Send <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Contact-us--> 

<?php include('includes/fun-facts.php');?>
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

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script>
  function show() {
    document.getElementById("more-details").style.display = "";
  }
</script>
</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>
