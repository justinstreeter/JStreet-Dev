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
        </div>
        
        <section id='user_profile'>
    <div class='row'>
            ";
    
    foreach ($profile as $pro): 

   echo "
       <div class='col-sm-6 col-md-4'>
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
             <p><a href='active_projects.php' class='btn btn-custom2' role='button'>Active Projects</a> <a href='#' class='btn btn-custom' role='button'>Finished Projects</a></p>    
            </div>
            </div>
        </div>
        ";
                    
 endforeach;
   echo " </div>
    </section>";
}else{

    $sql = "SELECT profile.profile_img, profile.profile_info, users.id, users.uname, users.email, users.fname, users.lname, users.groups, users.date FROM users INNER JOIN profile ON users.id=profile.user_id ORDER BY users.id";
    
    $profile = $conn->query($sql);
    
   echo " <div class='col-lg-12'>
        <h1 id='profile_heading'>Profiles</h1>
        </div>
        <section id='user_profile'>
    <div class='row'>";
    
    foreach ($profile as $pro): 

   echo "
       <div class='col-sm-6 col-md-4'>
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
            <form action='active_projects.php' method='post'>
            <input type='hidden' name='uid' value='".$pro['id']; echo "'>
            <input type='hidden' name='fname' value='".$pro['fname']; echo "'/>
            <input type='hidden' name='lname' value='".$pro['lname']; echo "'/>
            <input type='hidden' name='proimg' value='".$pro['profile_img']; echo "'/>
             <p><input class='btn btn-custom2' type='submit' value='Active Projects'/> <a href='#' class='btn btn-custom' role='button'>Finished Projects</a></p>    
             </form>
            </div>
            </div>
        </div>
        ";
                    
 endforeach;
     echo "</div>
    </section>";
}


 
include 'footer.php';
?>