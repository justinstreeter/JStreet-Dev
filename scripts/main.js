
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
            $("#login_btn").click(function () {
                $(".header_login").toggle()  }); 
            
            $("#login #cancel_btn").click(function () {
                $(this).parent().parent().hide();
            });
            $("#login #cancel").click(function () {
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
            /*$("#loginbtn").click(function () {
                var name = $("#username").val();
                var password = $("#password").val();
                if (username == "" || password == "") {
                    alert("Username or Password was Wrong");
                } else {
                    $("#logindiv").css("display", "none");
                    $("#welcome").replaceWith("<a> Welcome " + name + " </a>").css("disply", "block");
                } 
            });*/
        });


    


        


   
   
            //lets handle the button click event
            $('#my_overview').on('click', function (e) {
                $('body, html').stop().animate({
                    scrollTop: 0
                }, 'slow', 'swing');
                e.preventDefault();
            });

            $('#my_profile').on('click', function (e) {
                $('body, html').stop().animate({
                    scrollTop: $("#profile").offset().top 
                }, 'slow', 'swing');
                e.preventDefault();
            });

                $('#my_contact').on('click', function (e) {
                $('body, html').stop().animate({
                    scrollTop: $("#contactme").offset().top 
                }, 'slow', 'swing');
                e.preventDefault();
            });

        $('#my_service').on('click', function (e) {
                $('body, html').stop().animate({
                    scrollTop: $("#services").offset().top
                }, 'slow', 'swing');
                e.preventDefault();
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

/*$(document).ready(function() {
    var previousScroll = 0,
        headerOrgOffset = $('#overview').offset().top;

    $(window).scroll(function() {
        var currentScroll = $(this).scrollTop();
       
            if (currentScroll >= previousScroll) {
                $('.promote-layer').fadeOut("1000");
            } else {
                $('.promote-layer').fadeIn("1000");
                $('.promote-layer').addClass('fixed');
            }
        
        previousScroll = currentScroll;
    });

});*/

$(document).ready(function() {
    var previousScroll = 0,
        headerOrgOffset = $('.styleguide__feature-spotlight').offset();

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
        headerOrgOffset = $('#mobile').offset();

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

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.promote-layer').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
         $('.promote-layer').fadeOut("1000");
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
             $('.promote-layer').fadeIn("1000");
        }
    }
    
    lastScrollTop = st;
}
   

    
