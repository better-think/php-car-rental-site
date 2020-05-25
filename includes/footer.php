<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>
<style>
  a{
    color:#FFFFFF
  }
</style>
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-12">
          <h6 style="text-align:center">Smotors.az</h6>
          <div class="FooterNew-social" style="text-align:center">
              <a class="FooterNew-social-icon Icon Icon--light" rel="nofollow" href="https://www.facebook.com/fansoffreelancer" target="_blank" title="Freelancer on Facebook" data-qtsb-section="footer" data-qtsb-subsection="AppsAndSocial" data-qtsb-label="GoToFacebook">
                  <svg class="Icon-image" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g stroke="none" stroke-width="1" fill-rule="evenodd">
                  <polygon id="Mask" opacity="0" fill="none" points="2 2 22 2 22 22 2 22"></polygon>
                  <path d="M22,12 C22,6.47714844 17.5228516,2 12,2 C6.47714844,2 2,6.47714844 2,12 C2,16.9912891 5.65685547,21.1283203 10.4375,21.8785156 L10.4375,14.890625 L7.8984375,14.890625 L7.8984375,12 L10.4375,12 L10.4375,9.796875 C10.4375,7.290625 11.9304297,5.90625 14.2146484,5.90625 C15.3087305,5.90625 16.453125,6.1015625 16.453125,6.1015625 L16.453125,8.5625 L15.1921484,8.5625 C13.9499023,8.5625 13.5625,9.33333984 13.5625,10.1241602 L13.5625,12 L16.3359375,12 L15.8925781,14.890625 L13.5625,14.890625 L13.5625,21.8785156 C18.3431445,21.1283203 22,16.9912891 22,12"></path>
              </g>
          </svg>

              </a>
              <a class="FooterNew-social-icon Icon Icon--light" rel="nofollow" href="https://www.twitter.com/freelancer" target="_blank" title="Freelancer on Twitter" data-qtsb-section="footer" data-qtsb-subsection="AppsAndSocial" data-qtsb-label="GoToTwitter">
                  <svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.192 21c-2.28 0-4.404-.668-6.192-1.815 2.144.252 4.282-.342 5.98-1.672-1.768-.034-3.26-1.202-3.772-2.806.633.12 1.256.085 1.823-.07-1.942-.39-3.282-2.14-3.24-4.01.545.302 1.17.484 1.83.505C2.822 9.93 2.313 7.555 3.37 5.738c1.992 2.444 4.97 4.053 8.326 4.22C11.106 7.434 13.024 5 15.63 5c1.163 0 2.212.49 2.95 1.276.92-.18 1.785-.517 2.565-.98-.3.944-.942 1.736-1.775 2.235.817-.097 1.596-.314 2.32-.635-.542.807-1.228 1.52-2.016 2.088C19.93 14.665 15.694 21 8.192 21z"></path></svg>

              </a>
              <a class="FooterNew-social-icon Icon Icon--light" rel="nofollow" href="https://www.youtube.com/freelancerchannel" target="_blank" title="Freelancer on Youtube" data-qtsb-section="footer" data-qtsb-subsection="AppsAndSocial" data-qtsb-label="GoToYoutube">
                  <svg class="Icon-image" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g transform="translate(2.000000, 5.000000)" fill-rule="nonzero" stroke="none" stroke-width="1">
              <path d="M16.3458333,0.153435525 C13.3425,-0.0515616237 6.65333333,-0.0507283019 3.65416667,0.153435525 C0.406666667,0.375099108 0.0241666667,2.33673849 0,7.5 C0.0241666667,12.654095 0.403333333,14.6240676 3.65416667,14.8465645 C6.65416667,15.0507283 13.3425,15.0515616 16.3458333,14.8465645 C19.5933333,14.6249009 19.9758333,12.6632615 20,7.5 C19.9758333,2.34590503 19.5966667,0.37593243 16.3458333,0.153435525 Z M7.5,10.833287 L7.5,4.16671303 L14.1666667,7.49416675 L7.5,10.833287 L7.5,10.833287 Z" id="Shape"></path>
            </g>
          </svg>
              </a>
          </div><br/>
          <div class="footer-nav-bar"> 
            <a href="page.php?type=aboutus">Bizim komanda</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=faqs">Karyera</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=privacy">Reklam yerləşdir</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=terms">Supported Devices</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admin/">Terms of use</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=aboutus">privacy policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=privacy">Discovery.Inc</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=terms">Cookie Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="page.php?type=faqs">Bizimlə əlaqə</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admin/">Admin</a>
          </div>
        </div>
  
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-pull-12" style="text-align:center">
          <p class="copy-right">Copyright &copy; 2017 Car Rental Portal. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
</footer>