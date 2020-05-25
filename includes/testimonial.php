
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