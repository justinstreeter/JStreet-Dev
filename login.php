<?php
$message = " ";


        
        $userName = $_POST['user_login']; // required
        $pass = $_POST['password_login']; //required
    
        
        
        try{
        // bring in the db connection
        require 'dbcon.php';
        // encrypt password for valadation
        $md5pass = md5($pass);
        // check to see if the email and password exists in db
        $sql = "SELECT uname, pword FROM users WHERE uname = '$userName' AND pword = '$md5pass'";
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
		$message .= "There was an error checking the login info: " . $e->getMessage();	
		} // end try catch
         // User Authenticated in the DB
		if ($count != 0){
            $grpchk = "SELECT * FROM users WHERE uname = '$userName'";
            $usrgrp = $conn->query($grpchk);
            foreach($usrgrp as $usr){
                $level = $usr['groups'];
        }
			echo "You are logged in.";
			// Start Session to set Session Variables
			// and Cookies
			session_start();
			$_SESSION['uname'] = $userName;
            $_SESSION['groups'] = $level;
            
            echo $_SESSION['uname'] = $userName;
		// send user back to home
		//header("Location:index.php");
		$message .= "<a href='content.php' title='Home'>News Blog Home</a>";
		} else {
			echo "Please register";
            echo $userName;
          echo  $md5pass;
			$message .= "<a href='register.php' title='Register'>Register for a login</a>";
          
		}
         header ( 'location: index.php');
    
?><p><?php echo $message?></p>