<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Category</title>

    <link href="{{ asset('_libs/jquery-ui/themes/smoothness/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('_libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('_libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('_libs/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('_libs/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('_libs/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('_libs/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('_libs/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>



</head>



<body>
    <!-- // mv_navbar_start -->
    <style>
        body{
            padding-top: 100px;
        }
        .global-header {
            width: 100%;
            background-color: #333;
            color: #efefef;
            position:fixed;
            top:0;
            left:0;
            transition: top .2s ease-in;
            z-index: 9999
        }
        .global-header .container-fluid {
            padding-top: 30px;
        }
        .js-global-header-scrolling {
            top: -2em; /* Height of the header */
        }
        .row {
        display: flex;
        flex-wrap: wrap;
        }
        .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
        }
        .clearfix {
            float: none;
            display: block;
            content: "";
            clear: both;
        
        }
        .navbar-default{
            box-shadow: 0px 0px 0px ;
            -webkit-box-shadow:0px 0px 0px;
        }

    </style>
    <nav class="navbar navbar-default global-header">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
                </li>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <script>
    //Requires JQuery or Zepto
    $(document).ready(function(){

    // Cache Header
    var $header = $('.global-header');

    // Get height of global-header to use later as starting point
    var $hHeight = $header.height();

    // Set initial position to current position on page
    var prevTop = $(window).scrollTop();

    // Scroll event
    $(window).on('scroll', function(e) {
    st = $(this).scrollTop(); // Set scroll location
    if (st > prevTop && st > $hHeight) { 
        $header.addClass('js-global-header-scrolling');
    } else {
        $header.removeClass('js-global-header-scrolling');
    }
    prevTop = st;
    });
    
    });
    </script>
    <!-- // mv_navbar_end -->
    <!-- // mv_FR1C2_start -->
    <?php $news_category = DB::table('news_categories')->find(10); ?>
    <style>
        #FR1C2_Left {
            background-color: #f6f6f6;
            padding-top: 70px;
            padding-bottom: 70px;
            color: #999;
            background-image: url('{{ asset("images/img_placeholder.jpg") }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        
        #FR1C2_Right {
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
   
    <div class="container-fluid">
        <div class="row">
            <div id="FR1C2_Left" class="col-sm-12 col-md-6 text-center">
                形象圖位置
            </div>
            <div id="FR1C2_Right" class="col-sm-12 col-md-6">

                <div class="col-md-10 col-md-offset-1">
                    <h2 style="margin-bottom: 1.25em;">{{ $news_category->name }}</h2>
                    <span class="text-justify">{!! $news_category->description !!}</span>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#FR1C2_Left').height($('#FR1C2_Right').height());
        })
    </script>
    <!-- // mv_FR1C2_end -->

    <p>&nbsp;</p>

    <!-- // mv_XR1C2_start -->
    <style>
        #XR1C2_Left {
            background-color: #f6f6f6;
            padding-top: 40px;
            padding-bottom: 40px;
            color: #999;
            background-image: url('{{ asset("images/img_placeholder.jpg") }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            /* border-left: 15px solid #fff; */
        }
        
        #XR1C2_Right {
            /* background-color: #f6f6f6; */
            padding-top: 40px;
            padding-bottom: 40px;
            /* border-right: 15px solid #fff; */
        }
    </style>
    <div class="container">
        <div class="row">
            <div id="XR1C2_Left" class="col-sm-12 col-md-6 text-center">
                形象圖位置
            </div>
            <div id="XR1C2_Right" class="col-sm-12 col-md-6">
                <div class="col-md-10 col-md-offset-1">
                    <h2 style="margin-bottom: 1.25em;">{{ $news_category->name }}</h2>
                    <span class="text-justify">{!! $news_category->description !!}</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#XR1C2_Left').height($('#XR1C2_Right').height());
        })
    </script>
    <!-- // mv_XR1C2_end -->

    <p>&nbsp;</p>

    <!-- // mv_XR1C4_start -->
    <?php $news_categories = DB::table('news_categories')->get(); ?>
    <style>
        .XR1C4>div:first-child {
            background-color: #f6f6f6;
            height: 150px;
            color: #999;
            background-image: url('{{ asset("images/img_placeholder.jpg") }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        
        @media(min-width:992px) {
            .XR1C4:first-child {
                padding-left: 0px;
            }
            .XR1C4:nth-child(4n) {
                padding-right: 0px;
            }
        }
    </style>
    <div class="container">
        <h2 class="col-md-12 text-center clearfix" style="margin-bottom: 1.25em;">營業項目</h2>

        <div class="row">
            @foreach($news_categories as $news_category)
            <div class="col-md-3 XR1C4">
                <div class="text-center">圖片位置</div>
                <h3 class="text-left">{{ $news_category->name }}</h3>
                <span class="text-justify">{!! substr($news_category->description, 3, 253) !!}</span>
            </div>
            @endforeach

        </div>

    </div>
    <!-- // mv_XR1C4_end -->
    <p>&nbsp;</p>
    <!-- // mv_news_start -->
    <style>
        .News h3{
            font-size: 0.8em;
        }
        .XR1C3>a:hover{
            text-decoration: none;
            color:#999;
        }
        .XR1C3>a>div:first-child {
            height: 250px;
            color: #999;
            padding: 3% 5%;
            margin-bottom: 20px
        }
        
        @media(min-width:992px) {
            .XR1C3:first-child {
                padding-left: 0px;
            }
            .XR1C3:nth-child(3n) {
                padding-right: 0px;
            }
            .XR1C3>a{
                display: block;
                width:100%;
                height:100%;
            }
            .XR1C3>a>div{
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.07)
            }
            .XR1C3>a>div:first-child.BoxShadow{
                box-shadow: 0 5px 10px 0 rgba(0,0,0,.07);
                /* margin-bottom:25px; */
            }
        }
    </style>
    <div class="container News">
        <div class="row">
            <h2 class="col-md-12 text-center" style="margin-bottom: 1.25em;">最新消息</h2>
            @foreach($news_categories as $news_category)
            <div class="col-md-4 XR1C3">
                <a href="#">
                    <div>
                        <h3 class="text-left">{{ $news_category->name }}</h3>
                        <p><span>2017.10.19</span></p>
                        <p><span class="text-justify">{!! substr($news_category->description, 3, 253) !!}</span></p>
                        
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $('.XR1C3>a').hover(function(){
            $(this).animate({'margin-top':'-5px'},400);
            $(this).find('div').addClass('BoxShadow');
        },function(){
            $(this).animate({'margin-top':'0px'},400);
            $(this).find('div').removeClass('BoxShadow');
        });
    });
    </script>
    <!-- // mv_news_end -->
    <p>&nbsp;</p>
    <!-- // mv_map_start -->
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
    <!-- </script>   -->

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }
      
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnD6yu9tqz6u_cGz1WasfFw4ys33YXaVg&callback=initMap"
    async defer></script>
    <script>
      var map;
      
      function initMap() {
        var myLatLng = {lat: 24.1368301, lng: 120.6836908};

        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 18,
          styles: [
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                  { "saturation": -100 },
                  { "lightness": -8 },
                  { "gamma": 1.18 }
                ]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                  { "saturation": -100 },
                  { "gamma": 1 },
                  { "lightness": -24 }
                ]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "administrative",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "transit",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "road",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "administrative",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "landscape",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
                "featureType": "poi",
                "stylers": [
                  { "saturation": -100 }
                ]
            }, {
            }
                      ]
        });
        var image = 'images/marker.png';
        var beachMarker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image
        });
      }
    </script>
    <div id="map" >&nbsp;</div>
    <!-- // mv_map_end -->
</body>

</html>