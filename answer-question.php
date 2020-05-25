<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['ask'])) {
  $name=$_POST['name_ask'];
  $surname=$_POST['surname_ask'];
  $question = $_POST['question'];
  $sql="INSERT INTO  tblquestion (name,surname,question) 
  VALUES(:name,:surname,:question)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':surname',$surname,PDO::PARAM_STR);
  $query->bindParam(':question',$question,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();;
  header('location:answer-question.php?answer-id='.$lastInsertId.'');
  // if($lastInsertId) {
  //   $msg="You resigned successfully.";
  // } else {
  //   $error="Something went wrong. Please try again";
  // }
} else if ( isset($_POST['send']) ){
  header('location:answer-question.php');
  $lastInsertId = $_GET['answer-id'];
  $name=$_POST['name_answer'];
  $surname=$_POST['surname_answer'];
  $answer = $_POST['answer'];
  $sql="INSERT INTO  tblanswer (name,surname,answer,QuestionId) 
  VALUES(:name,:surname,:answer,:question)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':surname',$surname,PDO::PARAM_STR);
  $query->bindParam(':answer',$answer,PDO::PARAM_STR);
  $query->bindParam(':question',$lastInsertId,PDO::PARAM_STR);
  $query->execute();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--  -->
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
    #navigation{
      margin-bottom: 0px !important;
    }
  </style>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/lmitatiedWithBootstrap.min.css" type="text/css">
<!--  -->
</head>
<body>


<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Listing-->
<form enctype="multipart/form-data" method="post">
  <section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="result-sorting-wrapper">
              <div class="sorting-count">
                  <p><span>ANSWERS&QUESTIONS</span></p>
              </div>
          </div>
          <div class="roduct-listing-content">
            <?php 
              $sql = "SELECT id, name, surname, question FROM tblquestion";
              $query = $dbh -> prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0){
                foreach($results as $result){?>
                  <div class="w3-panel  w3-bottombar w3-border-green w3-border">
                    <div class="w3-panel ">
                      <div class="w3-panel   w3-border-green w3-border">
                          <p>Name:<?php echo htmlentities($result->name); ?>, Surname:<?php echo htmlentities($result->surname); ?></p>
                          <div class="w3-panel w3-blue-grey w3-round-xlarge">
                            <Strong>Question:</Strong>
                            <p><?php echo htmlentities($result->question); ?></p>
                          </div>
                          <!-- <div class="w3-btn w3-white w3-border w3-border-green w3-round-xlarge " onclick="AnswerAndQuestionFunc(1, <?php echo htmlentities($result->id); ?>)">Answer</div> -->
                          <!-- <a class="w3-btn w3-white w3-border w3-border-green w3-round-xlarge " href = "http://localhost/carrental/answer-question.php?answer-id=<?php echo htmlentities($result->id); ?>">Answer</a><br> -->
                          <a href = "answer-question.php?answer-id=<?php echo htmlentities($result->id); ?>">
                            <img src = "./assets/images/favicon-icon/message.png"   />
                          </a>
                      </div>
                      <?php 
                        $sql_2 = "SELECT id, name, surname, answer FROM tblanswer WHERE QuestionId=$result->id";
                        $query_2 = $dbh -> prepare($sql_2);
                        $query_2->execute();
                        $results_2=$query_2->fetchAll(PDO::FETCH_OBJ);
                        $cnt_2=1;
                        if($query_2->rowCount() > 0){
                          foreach($results_2 as $result_2){
                      ?>
                      <span class="badge badge-success" onclick = "displayFunc(<?php echo htmlentities($result_2->id)  ?>)"id = <?php echo htmlentities($result_2->id) ?>>
                        <?php 
                        $name = ($result_2->name);
                        $name=="" ? $name = "Noname": $name = ($result_2->name);
                        echo htmlentities($name);
                        ?>
                      </span>
                      <div class="w3-panel w3-pale-green w3-border-green w3-border "
                      style = "display: none" id = "answer-<?php echo htmlentities($result_2->id) ?>"
                      >
                        <div class="w3-panel ">
                          <p>Name:<?php echo htmlentities($result_2->name); ?> ,Surname:<?php echo htmlentities($result_2->surname); ?></p>
                          <div class="w3-panel w3-light-blue w3-round-xlarge">
                            <Strong>Answer:</Strong>
                            <p><?php echo htmlentities($result_2->answer); ?></p>
                          </div>
                          
                        </div>
                      </div>
                      <!-- <div class="alert alert-info" style = "display: none" id = "answer-<?php echo htmlentities($result_2->id) ?>" >
                        <strong>Name:</strong> <?php echo htmlentities($result_2->name); ?><strong>Surname:</strong> <?php echo htmlentities($result_2->surname); ?><strong>Answer:</strong> <?php echo htmlentities($result_2->answer); ?>
                      </div> -->
                          <?php }} ?>
                    </div>
                  </div>
                <?php }} ?>
              
          </div>
          
        </div>
        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          
          <?php 
            if ( isset($_GET['answer-id']) ) {?>
            <div class="sidebar_widget" id = "answer_widget">
              <div class="widget_heading">
                <h5><img src = "./assets/images/favicon-icon/stackexchange.png"></img> ANSWER</h5>
              </div>
              <div class="recent_addedcars">
                <div class="contact_form gray-bg">
                        <div class="form-group">
                          <label class="control-label"> Name <span>*</span></label>
                          <input type="text" name="name_answer" class="form-control white_bg" id="name_answer" >
                          <label class="control-label">Surname <span>*</span></label>
                          <input type="text" name="surname_answer" class="form-control white_bg" id="surname_answer" >
                          <label class="control-label">Answer <span>*</span></label>
                          <textarea class="form-control white_bg" name="answer" rows="3" id="answer"></textarea>
                          <button class="btn" type="submit" name="send"id="send">Answer <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                </div>
              </div>
            </div>
          <?php
            } else {
            ?>
            <div class="sidebar_widget"id = "ask_widget">
              <div class="widget_heading">
                <h5><img src = "./assets/images/favicon-icon/ask-question.png"/>QUESTION </h5>
              </div>
              <div class="sidebar_filter">
                  <div class="contact_form gray-bg">
                    <div class="form-group">
                        <label class="control-label"> Name <span>*</span></label>
                        <input type="text" name="name_ask" class="form-control white_bg" id="name_ask" >
                        <label class="control-label">Surname <span>*</span></label>
                        <input type="text" name="surname_ask" class="form-control white_bg" id="surname_ask" >
                        <label class="control-label">Ask your question <span>*</span></label>
                        <textarea class="form-control white_bg" name="question" rows="3" id="question"></textarea>
                        <button class="btn" type="submit" name="ask"id="ask">ASK <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
                  </div>
              </div>
            </div>
          <?php }?>
          
        </aside>
        <!--/Side-Bar--> 
      </div>
    </div>
  </section>
</form>

<!-- /Listing--> 

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
<!-- user function start -->
<script>
    function displayFunc(param) {
      var id = "answer-" + param;
      var state = document.getElementById(id).style.display;
      if ( state == "none") {
        document.getElementById(id).style.display = "";
      } else {
        document.getElementById(id).style.display = "none";
      }
    }
    // function AnswerAndQuestionFunc (param, param_2) {
    //   if ( param == 1 ) {
    //     var state = document.getElementById("answer_widget").style.display;
    //     if ( state == "none") {
    //       document.getElementById("answer_widget").style.display = "";
    //     }
    //     document.getElementById("ask_widget").style.display = "none";
    //   } 
    // }
</script>
<!-- user function end -->
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

</body>
</html>
