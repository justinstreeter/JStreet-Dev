<?php
include 'header.php';
?>

          
        <main>


            <section id="overview">
                <h3 class="xxlarge" style="color:white;">Get Online,Get Noticed</h3>
                <hr />
                <p class="overview_content" style="color:white; text-align:center; font-size:30px; text-shadow: 1px 0px 3px gray;">Get yourself an online presence and reach more people with a tailior made web site or app that has your needs in mind.</p>


            </section>
        </main>
    </div>
     <!-- Header -->
    <section id="profile">
    <div class="profile_me">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="images/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Justin Streeter</span>
                        <hr class="star-light">
                        <span class="skills">Web Developer - App Development - Content Managment Systems</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--services section-->
    <section id="services">
    <h1 id="service-heading">What I Can Do For You</h1>
        <hr />
        <br/>
        <br/>
    <div class="row">
        <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="service_img" src="images/webdev.jpg">
            <div class="caption">
            <h3>Web Development</h3>
            <p style="text-align:center;">the website you want to the price you can afford</p>
             <p style=""><a href="#" class="btn btn-custom2" role="button">Learn More</a> <a href="#" class="btn btn-custom" role="button">Examples</a></p>    
            </div>
            </div>
        </div>
         <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="service_img" src="images/mobileapps.jpg">
            <div class="caption">
            <h3>App Development</h3>
            <p>the website you want to the price you can afford</p>
             <p><a href="#" class="btn btn-custom2" role="button">Learn More</a> <a href="#" class="btn btn-custom" role="button">Examples</a></p>    
            </div>
            </div>
        </div>
         <div class="col-sm-12 col-md-4">
        <div class="thumbnail">
            <img class="service_img" src="images/cms.jpg">
            <div class="caption">
            <h3>Content Managment Systems</h3>
            <p>the website you want to the price you can afford</p>
             <p><a href="#" class="btn btn-custom2" role="button">Learn More</a> <a href="#" class="btn btn-custom" role="button">Exaples</a></p>    
            </div>
            </div>
        </div>
        </div>
    </section>
    
    
      <!-- Contact Section -->
    <section id="contactme">
        <div class="container">
            <div class="row">
  <div class="col-lg-12" id="center_text">
                    <h1 id="contact_me">Contact Me</h1>
                    <hr class="star-primary">
                </div>
            
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" action="contact_me.php" method="post" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
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
        
 <?php 
include 'footer.php';
?>