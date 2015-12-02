<?php
include 'header.php';
$user = "user";
$message = " ";
$valid = false;
// Check to see if form was submitted via POST
if($_POST){
// Check for fname
if($_POST['fname']){
$fname = $_POST['fname'];
$valid = true;
} else {
	$valid = false;
	$message .= "First Name is required.<br />";
} // end fname check
// Check for lname
if($_POST['lname']){
$lname = $_POST['lname'];
$valid = true;	
} else {
	$valid = false;
	$message .= "Last Name is required.<br />";
}// end lname check
// check for email
    if($_POST['username']){
    $user_name = $_POST['username'];
    $valid = true;
    }else{
    $valid = false;
    $message .= "please enter a username";
    }
if($_POST['email']){
$email = $_POST['email'];
$valid = true;	
} else {
$valid = false;
 $message .= "please enter a email";   
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
$message .= "Please enter a password.<br />";
} // pass check
// check confirm password
if ($_POST['pass2']){
$valid = true;
$pass2 = $_POST['pass2'];
	// Check to see that the passwords match
	  if ($pass != $pass2){
		  $valid = false;
		$message .= "The passwords do not match.";  
	  } else {
		  $valid = true;
		  // Encrypt Password
		$encPass = md5($pass); 
	  } // end password match
} else {
	$valid = false;
	$message .= "Please confirm your password.<br />";
} // end pass2 check
if($valid && $count == 0){
	//echo $email, $encPass, $fname, $lname;
	// try to query the DB
		try{
            require 'dbcon.php';
		// Check to see if that Email Address exists in our DB
			$sql = "INSERT INTO users (id, uname, pword, email, fname, lname, groups) VALUES ('', '$user_name', '$encPass', '$email', '$fname', '$lname', '$user')";
		// execute SQL query
		$row = $conn->prepare($sql);
		$row->execute();
         $count = $row->rowCount();   
		// let user know that the info was inserted into the DB
		$message .= "Account registered.<br />";
		} 
		// catch the Exception if it could not query the DB
		catch (Exception $e){
		// Display an error message as well as the system generated error
		$message .= "There was an error registering account: " . $e->getMessage();	
		} // end try catch
} // end $valid check

}

?>

<p><?php echo $message; ?></p>
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
                    <form method="post">
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