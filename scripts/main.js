/*!
 *
 *  Web Starter Kit
 *  Copyright 2014 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
(function () {
  'use strict';

  var querySelector = document.querySelector.bind(document);

  var navdrawerContainer = querySelector('.navdrawer-container');
  var body = document.body;
  var appbarElement = querySelector('.app-bar');
  var menuBtn = querySelector('.cmn-toggle-switch');
  var main = querySelector('main');

  function closeMenu() {
      
    body.classList.remove('open');
    appbarElement.classList.remove('open');
    navdrawerContainer.classList.remove('open');
    menuBtn.classList.remove('active');  
  }

  function toggleMenu() {
    body.classList.toggle('open');
    appbarElement.classList.toggle('open');
    navdrawerContainer.classList.toggle('open');
    
    navdrawerContainer.classList.add('opened');
  }

  main.addEventListener('click', closeMenu);
  menuBtn.addEventListener('click', toggleMenu);
  navdrawerContainer.addEventListener('click', function (event) {
    if (event.target.nodeName === 'A' || event.target.nodeName === 'LI') {
      closeMenu();
    }
  });
})();

        jQuery(document).ready(function ($) {
            //lets handle the button click event
            $('.to-top-btn').on('click', function (e) {
                $('body, html').stop().animate({
                    scrollTop: 0
                }, 'slow', 'swing');
                e.preventDefault();
            });

            //lets show the button when the page scroll to about 400 pixels
            //change the value to your desired offset
            $(window).scroll(function () {
                if ($(window).scrollTop() > 400) {
                    //show the button when scroll offset is greater than 400 pixels
                    $('.to-top-btn').fadeIn('slow');
                } else {
                    //hide the button if scroll offset is less than 400 pixels
                    $('.to-top-btn').fadeOut('slow');
                }
            });
        });
    
    
        $(document).ready(function () {
            $("#star").click(function () {
                $("#logindiv").css("display", "block");
            });
            $("#login #cancel_btn").click(function () {
                $(this).parent().parent().hide();
            });
            $("#cont").click(function () {
                $("#contactdiv").css("display", "block");
            });
            $("#contact #cancel_btn").click(function () {
                $(this).parent().parent().hide();
            });
            $("#login #cancel").click(function () {
                $(this).parent().parent().hide();
            });
            $("#contact #cancel").click(function () {
                $(this).parent().parent().hide();
            });
            // Contact form popup send-button click event.
            $("#send").click(function () {
                var name = $("#name").val();
                var email = $("#email").val();
                var contact = $("#contactno").val();
                var message = $("#message").val();
                if (name == "" || email == "" || contactno == "" || message == "") {
                    alert("Please Fill All Fields");
                } else {
                    if (validateEmail(email)) {
                        $("#contactdiv").css("display", "none");
                    } else {
                        alert('Invalid Email Address');
                    }

                    function validateEmail(email) {
                        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                        if (filter.test(email)) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            });
            // Login form popup login-button click event.
            $("#loginbtn").click(function () {
                var name = $("#username").val();
                var password = $("#password").val();
                if (username == "" || password == "") {
                    alert("Username or Password was Wrong");
                } else {
                    $("#logindiv").css("display", "none");
                    $("#welcome").replaceWith("<a> Welcome " + name + " </a>").css("disply", "block");
                } 
            });
        });
    


        


   


        $("#code1").click(function () {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: $("#code-sample1").offset().top - -30
            }, 700);
            $(".code-sample").show("slow");
        });
    
        $("#overview1").click(function () {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: $("#overview").offset().top - 100
            }, 700);
    
        });

         $("#mobile1").click(function () {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: $("#mobile").offset().top - -30
            }, 700);
            $(".mobile-sample").show("slow");
        });
   
        (function () {

            "use strict";

            var toggles = document.querySelectorAll(".cmn-toggle-switch");

            for (var i = toggles.length - 1; i >= 0; i--) {
                var toggle = toggles[i];
                toggleHandler(toggle);
            };

            function toggleHandler(toggle) {
                toggle.addEventListener("click", function (e) {
                    e.preventDefault();
                    (this.classList.contains("active") === true) ? this.classList.remove("active") : this.classList.add("active");



                });
            }

        })();

$(document).ready(function() {
    var previousScroll = 0,
        headerOrgOffset = $('#overview').offset().top;

    $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
        if(currentScroll > headerOrgOffset) {
            if (currentScroll > previousScroll) {
                $('.promote-layer').fadeOut();
            } else {
                $('.promote-layer').fadeIn();
                $('.promote-layer').addClass('fixed');
            }
        } else {
             $('.promote-layer').removeClass('fixed');   
        }
        previousScroll = currentScroll;
    });

});

$(document).ready(function() {
    var previousScroll = 0,
        headerOrgOffset = $('.styleguide__feature-spotlight').offset().top;

    $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
        if(currentScroll > headerOrgOffset) {
            if (currentScroll > previousScroll) {
                $('#code-sample').slideDown();
            } else {
                $('#code-sample').slideDown();
                
            }
        } 
        previousScroll = currentScroll;
    });

});

$(document).ready(function() {
    var previousScroll = 0,
        headerOrgOffset = $('#mobile').offset().top;

    $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
        if(currentScroll > headerOrgOffset) {
            if (currentScroll > previousScroll) {
                $('.mobile-sample').slideDown();
            } else {
                $('.mobile-sample').slideDown();
                
            }
        } 
        previousScroll = currentScroll;
    });

});
   

    
