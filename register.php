<?php
include 'header.php';
$user = "user";

date_default_timezone_set('US/Eastern');
// set date variable to mm/dd/yyyy
$date = date('m-d-Y h:m:s');

$valid = false;

// $sql = "SELECT profile.profile_img, users.fname, profile.profile_info, users.lname FROM profile INNER JOIN users ON users.id=profile.user_id WHERE uname = '$usr' ";

//$conn->query($sql);
// Check to see if form was submitted via POST
if($_POST){
// Check for fname
if($_POST['fname']){
$fname = $_POST['fname'];
$valid = true;
} else {
	$valid = false;
	$message = "First Name is required.<br />";
} // end fname check
// Check for lname
if($_POST['lname']){
$lname = $_POST['lname'];
$valid = true;	
} else {
	$valid = false;
	$message = "Last Name is required.<br />";
}// end lname check
// check for email
    if($_POST['username']){
    $user_name = $_POST['username'];
    $valid = true;
    }else{
    $valid = false;
    $message = "please enter a username";
    }
if($_POST['email']){
$email = $_POST['email'];
$valid = true;	
} else {
$valid = false;
 $message = "please enter a email";   
}
    	// The Email Address exists
    	// try to query the DB
		try{
		// bring in the DB connection
		require 'dbcon.php';
		// Check to see if that Email Address exists in our DB
			$sql = "SELECT * FROM users WHERE email = '$email'";
		// execute SQL query
		$row = $conn->prepare($sql);
		$row->execute();
		// Count results, if found $count == 1
		$count = $row->rowCount();
		// echo $count;
		} 
		// catch the Exception if it could not query the DB
		catch (Exception $e){
		// Display an error message as well as the system generated error
		$message .= "There was an error checking the DB for the Email Address: " . $e->getMessage();	
		} // end try catch
 // Email Address exists in the DB
		if ($count != 0){
			$valid = false;
			$message = "That Email Address already exists in our database.";
		}
		 // end getmxrr
	 //end email check
// check password
if($_POST['pass']){
$valid = true;
$pass = $_POST['pass'];
} else {
$valid = false;
$message = "Please enter a password.<br />";
} // pass check
// check confirm password
if ($_POST['pass2']){
$valid = true;
$pass2 = $_POST['pass2'];
	// Check to see that the passwords match
	  if ($pass != $pass2){
		  $valid = false;
		$message = "The passwords do not match.";  
	  } else {
		  $valid = true;
		  // Encrypt Password
		$encPass = md5($pass); 
	  } // end password match
} else {
	$valid = false;
	$message = "Please confirm your password.<br />";
} // end pass2 check
    
    
    

$img_name = basename($_FILES["fileToUpload"]["name"]);
$target_dir = "uploads/";
$target_file = $target_dir . $img_name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
$temp_img = $_FILES["fileToUpload"]["tmp_name"];    

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists

// Check file size
if (($_FILES["fileToUpload"]["size"] > 5000000) && ($uploadOk == 1)) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if (($uploadOk == 1) && (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
&& strtolower($imageFileType) != "gif")) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	echo $imageFileType;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". $img_name. " has been uploaded. <br/>";
       $new_img_name = explode(".", $img_name);
           
        $count_var = count($new_img_name) -1;
        $file_ext = $new_img_name[$count_var];
        
        $user_img_name = $user_name.".".$file_ext;
        
        $new_user_img_name = $target_dir.$user_img_name;
        $message = $user_img_name. "is uploaded";
        
        
        
       rename($target_file,$new_user_img_name);
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

        
        
        
    
    
    if($_POST['message']){
    $profileinfo = $_POST['message'];
    $valid = true;
    }else{
    $valid = false;
    $message = "please enter a message";
    }
    
if($valid && $count == 0){
	//echo $email, $encPass, $fname, $lname;
	// try to query the DB
		try{
            require 'dbcon.php';
		// Check to see if that Email Address exists in our DB
			$sql = "INSERT INTO users (id, uname, pword, email, fname, lname, date, groups) VALUES ('', '$user_name', '$encPass', '$email', '$fname', '$lname', '$date',  '$user')";
		// execute SQL query
		$row = $conn->prepare($sql);
		$row->execute();
         $count = $row->rowCount();   
            $message .= "account registered";
		// let user know that the info was inserted into the DB
		// catch the Exception if it could not query the DB
        }catch (Exception $e){
		// Display an error message as well as the system generated error
		$message = "There was an error registering account: " . $e->getMessage();	
		} // end try catch

    try{
    
         require 'dbcon.php';
            
            $sql3 = "SELECT * from users WHERE uname = '$user_name'";
            $user_id = $conn->query($sql3); 
            foreach($user_id as $usrid){
            $userid = $usrid['id'];
            }
    }catch (Exception $e){
		// Display an error message as well as the system generated error
		$message = "There was an error registering account: " . $e->getMessage();	
		} // end try catch 
            
            try{
            
                require 'dbcon.php'; 
                $sql2 = "INSERT INTO profile (id, user_id, profile_img, profile_info) VALUES ('', '$userid', '$user_img_name', '$profileinfo');";
                $conn->query($sql2);
                $message = "Account registered ".$fname."<br />";
		}catch (Exception $e){
		// Display an error message as well as the system generated error
		$message = "There was an error registering account: " . $e->getMessage();	
		} // end try catch  
        
    //ipload image
    
            
 // end $valid check
}
}


?>


<main>
    </main>
 <section id="contactme">
        <div class="container">
            <div class="row">
  <div class="col-lg-12" id="center_text">
                    <h1 id="contact_me">Register User</h1>
                    <hr class="star-primary">
                </div>
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form method="post" enctype='multipart/form-data'>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" id="name" name="fname" required data-validation-required-message="Please enter your first name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" id="name" name="lname" required data-validation-required-message="Please enter your nast name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="name" name="username" required data-validation-required-message="Please enter your username.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Password Confirmed</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" id="pass2" name="pass2" required data-validation-required-message="Please reenter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Date</label>
                                <input type="text" class="form-control" placeholder="Date" id="date" name="date" value="<?php echo $date; ?>" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Upload Profile Picture</label>
                                <div style=" background-image: url('uplaods/<?php echo $user_name ?>'); " id="reg_img">
                                <input type="file" class="form-control"  id="fileToUpload" name="fileToUpload"/>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include 'footer.php';