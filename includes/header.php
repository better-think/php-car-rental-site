
<header>
  <div class="default-header" id="newstyle">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> 
            <a href="index.php">
              <img src="assets/MDB/img/logo/logo.png" alt="image"  width="200px"/>
            </a> 
          </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="false"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:info@example.com">info@example.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:61-1234-5678-09">+91-1234-5678-9</a> </div>
            <?php   if(strlen($_SESSION['login'])==0)
                {	
              ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
              <?php }
              else{ 
              echo "Welcome To Car rental portal";
              } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <!-- <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div> -->
      <div class="header_wrap" id="navigation">
        <ul id="carrent" class="nav">
          <li><a href="find-master.php">Usta tap</a>    </li>
          <li><a href="index.php#multi-item-example">Ehtiyyat hisseler </a></li>
          <li><a href="answer-question.php">Sual – Cavab </a></li>
        </ul>
      </div>
      <div class="header_wrap">
      
        <div class="user_logins">
          <ul>
            <li class="dropdown" id="styleli"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><img src="admin/img/ts-avatar.jpg" width="40px" height="40px" style="border:1px solid #FFF;border-radius:50%"/></a>
              
                    <ul id="myUL" class="dropdown-menu" style="margin-left:-130px;background-color: #4285f4;border:1px solid #fff">
                  <?php if($_SESSION['login']){?>
                        <li style="border-top: 0px solid #ddd;width:140px;margin-left:9px;"><a href="profile.php">Profile Settings</a></li>
                        <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="update-password.php">Update Password</a></li>
                        <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="my-booking.php">My Booking</a></li>
                        <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="post-testimonial.php">Post a Testimonial</a></li>
                        <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="my-testimonials.php">My Testimonial</a></li>
                        <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="logout.php">Sign Out</a></li>
                    <?php } else { ?>
                          <li style="border-top: 0px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                          <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                          <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                          <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a></li>
                          <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Testimonial</a></li>
                          <li style="border-top: 1px solid #ddd;width:140px;margin-left:9px;"><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
                    
                    <?php } ?>
                  </ul>
                
            </li>
          </ul>
        </div>
<!--         
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div> -->
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>