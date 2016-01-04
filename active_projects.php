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
        $userid = $_POST['uid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $proimg = $_POST['proimg'];
         $sql = "SELECT u.id, u.fname, u.lname, p.profile_img, pn.project_id, pn.project_names, pn.project_desc, pn.start_date, pn.project_img FROM users as u INNER JOIN profile as p ON u.id = p.user_id INNER JOIN project_name as pn ON u.id = pn.user_id WHERE u.id = '$userid' ";
        
    $profile = $conn->query($sql);
          
echo " <div class='col-lg-12'>
        <h1 id='active_heading'>Active Projects</h1>
        </div>
        
        <div class='row'>
      <div class='col-md-12'>
          <div class='row'>
          <div class='col-md-6 col-md-offset-3' id='active-col' >    
          <div class='col-md-3' style='padding: 10px 0 10px 0;'>
          <div class='profile_small_img' style='background-image: url(uploads/"; echo $proimg; echo ")'>
          </div>
          </div>
          <div class='col-md-9'>
              <h3 id='profile_name'>"; echo $fname; echo " "; echo $lname; echo "</h3>
              
              </div>
              </div>
          </div>
        
        ";
        
    foreach ($profile as $pro):
    
      echo " 
      <section id='active_prof'>     
       <div class='row' >
       
         <div class='col-md-6 col-md-offset-3 ' id='active-col' style='margin-top:50px; margin-bottom: 50px; '>
         <h3>Progress</h3>
          <form class='thumb_img' id='profile_form' action='img_upload.php' method='post' enctype='multipart/form-data'>
            <div class='screenshot_img' style='background-image: url(uploads/".$pro['project_img']; echo ")'>
            <input id='fileToUpload' name='fileToUpload' type='file' />
            <input type='hidden' name='username' value='$usr'/>
            </div>
            <p style='text-align:center; padding-top:10px;'> Date Updated: ".$pro['start_date']; echo "</p>
            </form>
          <p style='text-align:center;'>".$pro['project_desc']; echo "</p>
            <p style='text-align:center;'><a href='active_edit.php' class='btn btn-custom2' role='button'>Make Update</a></p>    
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