<?php

function insert_image($insert_img, $user_id){
require 'dbcon.php';
    try{
        $sql1 = "SELECT * FROM users WHERE uname = '$user_id'";
       $id_user = $conn->query($sql1);
        foreach ($id_user as $id){
        $newid = $id['id'];
        }
    
    }
   catch (Exception $e){
	// Display an error message as well as the system generated error
	echo "There was an error adding profile pic: " . $e->getMessage();	
	}
    
try{
	// bring in the DB connection
	
	// SQL query in the $sql variable
	$sql = "UPDATE profile SET id = '', user = $newid, profile_img = $insert_img";
	// execute SQL query
	$conn->query($sql);
	} 
	// catch the Exception if it could not query the DB
	catch (Exception $e){
	// Display an error message as well as the system generated error
	echo "There was an error adding profile pic: " . $e->getMessage();	
	}
}


 


$new_file_name = $_POST['username'];
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
        echo "The file ". $img_name. " has been uploaded. <br/>";
       $new_img_name = explode(".", $img_name);
           
        $count_var = count($new_img_name) -1;
        $file_ext = $new_img_name[$count_var];
        
        $user_img_name = $new_file_name.".".$file_ext;
        
        $new_user_img_name = $target_dir.$user_img_name;
        $message = $user_img_name. "is uploaded";
        
        insert_image($user_img_name, $new_file_name);
        
       rename($target_file,$new_user_img_name);
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

header ('location: profiles.php' );
?>