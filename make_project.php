<?php

include 'header.php';
require 'dbcon.php';

$proid =$_POST['sendid'];



?>


<main>
    </main>
 <section id="contactme">
        <div class="container">
            <div class="row">
  <div class="col-lg-12" id="center_text">
                    <h1 id="contact_me">Make New Project</h1>
                    <hr class="star-primary">
                </div>
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form method="post" enctype='multipart/form-data'>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Project Name</label>
                                <input type="text" class="form-control" placeholder="Project Name" id="proName" name="proName" required data-validation-required-message="Please enter your first name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                       <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Project Description</label>
                                <textarea rows="5" class="form-control" placeholder="Project Description" id="proDesc" name="proDesc" required data-validation-required-message="Please enter a message."></textarea>
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
?>