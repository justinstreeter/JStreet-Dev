</div>     
<div class="endfoot"></div>
    <div class="footer">

        <div id="map-canvas"></div>
        &nbsp;

        <div class="row">
            <div class="col-md-4" id="half1">
                
                    <h1 class="footer_headings">links</h1>
                    <li class="list__item"><a href="#ignore-click">Lorem ipsum dolor sit amet</a>
                    </li>
                    <li class="list__item"><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a>
                    </li>
                    <li class="list__item"><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a>
                    </li>
                   
            </div>
            <div class="col-md-4" id="half2">
                
                    <h1 class="footer_headings">social</h1>

                <a href="https://plus.google.com/u/0/106944164306536004139/posts/p/pub" target="_blank"><div class="googleplus"></div></a>
                <a href="https://www.facebook.com/justin.streeter.336" target="_blank"><div class="facebook"></div></a>
                <a href="https://twitter.com/justinjstreeter"  target="_blank"><div class="twitter"></div></a>
                <a href="https://github.com/justinstreeter" target="_blank"><div class="github"></div></a>
                <a href="https://jstreetdev.wordpress.com/" target="_blank"><div class="blog"></div></a>
               

            </div>
            <div class="col-md-4" id="half3">
            <h1 class="footer_headings">somthing</h1>
            </div>
        </div>
        <div id="copyright">
            &copy; 2015
            <script>
                new Date().getFullYear() > 2010 && document.write("- " + new Date().getFullYear());
            </script>, JStreet-Dev.
        </div>

    </div>
    <div class="endfoot"></div>
     <a href="#" class="to-top-btn">
        <img src="images/scroll_to_top.png" style="width:50px; height:50px; opacity: 0.9;" alt="back-to-top">
    </a>
    <div class="float_message"><?php echo $message ?></div>
    <script src="scripts/npm.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/bootstrap.js"></script>
    <script src="scripts/main.js"></script>
      <script>
        if(navigator.userAgent.match(/Trident\/7\./)) {
        $('body').on("mousewheel", function () {

            event.preventDefault();
            var wd = event.wheelDelta;
            var csp = window.pageYOffset;
            window.scrollTo(0, csp - wd);
        });
}
        </script>
    <script>
        var trios = new google.maps.LatLng(43.449076, -80.487363);
        if (navigator.geolocation) { //Checks if browser supports geolocation
            navigator.geolocation.getCurrentPosition(function (position) { //This gets the
                var latitude = position.coords.latitude; //users current
                var longitude = position.coords.longitude; //location
                var coords = new google.maps.LatLng(latitude, longitude); //Creates variable for map coordinates
                var directionsService = new google.maps.DirectionsService();
                var directionsDisplay = new google.maps.DirectionsRenderer();
                var mapOptions = //Sets map options
                    {
                        zoom: 15, //Sets zoom level (0-21)
                        center: coords, //zoom in on users location
                        mapTypeControl: true, //allows you to select map type eg. map or satellite
                        navigationControlOptions: {
                            style: google.maps.NavigationControlStyle.SMALL //sets map controls size eg. zoom
                        },
                        mapTypeId: google.maps.MapTypeId.ROADMAP //sets type of map Options:ROADMAP, SATELLITE, HYBRID, TERRIAN
                    };
                map = new google.maps.Map( /*creates Map variable*/ document.getElementById("map-canvas"), mapOptions /*Creates a new map using the passed optional parameters in the mapOptions parameter.*/ );
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(document.getElementById('panel'));
                var request = {
                    origin: coords,
                    destination: trios,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                };

                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    }
                });
            });
        }
    </script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>


</body>

</html>