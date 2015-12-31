<main>
</main>
<?php
include 'header.php';
require 'dbcon.php';

if ( @$_SESSION['groups'] != "admin"){

echo " <div class='col-lg-12'>
        <h1 id='active_heading'>Active Projects</h1>
        </div>";




































}else{
        
         $sql = "SELECT u.fname, u.lname, p.profile_img, ap.user_id, ap.screenshot_img, ap.update_info, ap.date_update, ap.start_date FROM users as u INNER JOIN profile as p on u.id = p.user_id INNER JOIN active_projects as ap on u.id = ap.user_id ORDER BY ap.date_update";
        
    $profile = $conn->query($sql);
    
        
echo " <div class='col-lg-12'>
        <h1 id='active_heading'>Active Projects</h1>
        </div>";
        
    foreach ($profile as $pro):
    
      echo " 
     <section id='active_prof'>
     <div class='row'>
      <div class='col-md-12'>
       <div class='row' id='active_section'>
        <div>
         <div class='col-md-6' style='margin: 50px 0px 50px 0px'>
         <h3>Progress</h3>
          <form class='thumb_img' id='profile_form' action='img_upload.php' method='post' enctype='multipart/form-data'>
            <div class='screenshot_img' style='background-image: url(uploads/".$pro['screenshot_img']; echo ")'>
            <input id='fileToUpload' name='fileToUpload' type='file' />
            <input type='hidden' name='username' value='$usr'/>
            </div>
            <p style='text-align:center; padding-top:10px;'> Date Updated: ".$pro['date_update']; echo "</p>
            </form>
          </div>
          <div class='col-md-6' style='height:500px; text-align:center; padding-top:50px;'>
          <div class='col-md-4'>
          <div class='profile_small_img' style='background-image: url(uploads/".$pro['profile_img']; echo ")'>
          </div>
          </div>
          <div class='col-md-8'>
              <h3 id='profile_name'>".$pro['fname']; echo "&nbsp".$pro['lname']."</h3>
              <p> Date of Project Start: ".$pro['start_date']; echo "</p>
              </div>
              <p style='margin: 200px 0px 100px 0px;'>".$pro['update_info']; echo "</p>
            <p><a href='active_projects.php' class='btn btn-custom2' role='button'>Active Projects</a> <a href='#' class='btn btn-custom' role='button'>Finished Projects</a></p>    
            </div>
         </div>
        </div>
       </div>
      </div>
     </section>  
             
                ";

endforeach;

}

?>





 <?php 
include 'footer.php';
?>