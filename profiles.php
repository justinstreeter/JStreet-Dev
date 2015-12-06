 <main>
</main>

<?php

include 'header.php';
require 'dbcon.php';

if ( @$_SESSION['groups'] != "admin"){

    $sql = "SELECT profile.profile_img, users.fname, profile.profile_info, users.lname FROM profile INNER JOIN users ON users.id=profile.user_id WHERE uname = '$usr' ";

    $profile = $conn->query($sql);
    
   echo " <div class='col-lg-12'>
        <h1 id='profile_heading'>Profile</h1>
        </div>";
    
    foreach ($profile as $pro): 

   echo "<section id='user_profile'>
    <div class='row'>
       <div class='col-md-6 col-md-offset-3'>
        <div class='thumbnail'>
            <form class='thumb_img' id='profile_form' action='img_upload.php' method='post' enctype='multipart/form-data'>
            <div class='profile_img' style='background-image: url(uploads/".$pro['profile_img']; echo ")'>
            <input id='fileToUpload' name='fileToUpload' type='file' />
            <input type='hidden' name='username' value='$usr'/>
            </div>
            </form>
            <div class='caption'>
            <h3 id='profile_name'>".$pro['fname']; echo "&nbsp".$pro['lname']."</h3>
            <p>".$pro['profile_info']; echo "</p>
             <p><a href='#' class='btn btn-custom2' role='button'>Active Projects</a> <a href='#' class='btn btn-custom' role='button'>Finished Projects</a></p>    
            </div>
            </div>
        </div>
        </div>
    </section>";
                    
 endforeach;
    
}else{

    $sql = "SELECT profile.profile_img, profile.profile_info, profile.id, users.uname, users.email, users.fname, users.lname, users.groups, users.date FROM users INNER JOIN profile ON users.id=profile.user_id ORDER BY users.id";
    
    $profile = $conn->query($sql);
    
   echo " <div class='col-lg-12'>
        <h1 id='profile_heading'>Profiles</h1>
        </div>";
    
    foreach ($profile as $pro): 

   echo "<section id='user_profile'>
    <div class='row'>
       <div class='col-md-6 col-md-offset-3'>
        <div class='thumbnail'>
            <form class='thumb_img' id='profile_form' action='img_upload.php' method='post' enctype='multipart/form-data'>
            <div class='profile_img' style='background-image: url(uploads/".$pro['profile_img']; echo ")'>
            <input id='fileToUpload' name='fileToUpload' type='file' />
            <input type='hidden' name='username' value='$usr'/>
            </div>
            </form>
            <div class='caption'>
            <p> Date Registered: ".$pro['date']; echo "</p>
            <h3 id='profile_name'>".$pro['fname']; echo "&nbsp".$pro['lname']."</h3>
            <p>".$pro['profile_info']; echo "</p>
             <p><a href='#' class='btn btn-custom2' role='button'>Active Projects</a> <a href='#' class='btn btn-custom' role='button'>Finished Projects</a></p>    
            </div>
            </div>
        </div>
        </div>
    </section>";
                    
 endforeach;
     
}


 
include 'footer.php';
?>