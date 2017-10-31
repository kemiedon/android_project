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
            <div class="col-md-12">
            <div id="XR1C2_Left" class="col-sm-12 col-md-6 text-center" >
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
                /* padding-left: 0px; */
            }
            .XR1C4:nth-child(4n) {
                /* padding-right: 0px; */
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
    <!-- // mv_XR1C3_start -->
    <style>
        .XR1C3 h3{
            font-size: 0.8em;
        }
        .XR1C3>a:hover{
            text-decoration: none;
            color:#999;
        }
        .XR1C3>a>div>div:first-child {
            height: 250px;
            color: #999;
            /* padding: 3% 5%; */
            margin-bottom: 20px
        }
        
        @media(min-width:992px) {
            .XR1C3:first-child {
                /* padding-left: 0px; */
            }
            .XR1C3:nth-child(3n) {
                /* padding-right: 0px; */
            }
            .XR1C3>a{
                display: block;
                width:100%;
                height:100%;
            }
            .XR1C3>a>div>div{
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.07)
            }
            .XR1C3>a>div>div:first-child.BoxShadow{
                box-shadow: 0 5px 10px 0 rgba(0,0,0,.07);
                /* margin-bottom:25px; */
            }
        }
    </style>
    <div class="container ">
        <div class="row">
            <h2 class="col-md-12 text-center" style="margin-bottom: 1.25em;">最新消息</h2>
            @foreach($news_categories as $news_category)
            <div class="col-md-4 XR1C3">
                <a href="#">
                    <div>
                         <div class="text-center">圖片位置</div>
                    
                        <p><span>2017.10.19</span></p>
                        <h3 class="text-left">{{ $news_category->name }}</h3>
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
    <!-- // mv_XR1C3_end -->
    <p>&nbsp;</p>
    <!-- // mv_XR1C2_001_start -->
    <style>
        .XR1C2_001 h4{
            margin-bottom: 40px;
        }
        .XR1C2_001:last-child{
            padding-right:0px;
        }
        .XR1C2_001>.BGI{
            display: block;
            width:100%;
            height:100%;
            background-color: #f6f6f6;
            
        }
        h4{
        font-size: 40px;
        }
        a{
        color:black;
        }
        .XR1C2_001:first-child ul{
            list-style-type: none;
            padding-left:15%;
            padding-right:10%;
        }
        .XR1C2_001 ul>li{
            border-bottom:1px solid #e2e2e2;
        }
        .XR1C2_001 ul>li:last-child{
            border:none;
        }
    </style>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-6 XR1C2">
      <h4 class="col-md-12">最新消息</h4>
      <ul>
        <li>
          <a href="">
          <!-- 騰資料 -->
            <span>data</span><span>category</span>
            <p>content</p>
          </a>
        </li>
    
      </ul>
    </div>
    <div class="col-md-6 RightCol XR1C2">
    <div class="BGI"></div>
    </div>
  </div>
</div>

    <!-- // mv_XR1C2_001_end -->
  <br><br>
    
    <!-- // mv_XR1C2_002_start -->
    <style>
    .col-md-8>div{
        background-color: #e2e2e2;
        width: 100%;
        height: 100%;
    }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div></div>
            </div>
            <div class="col-md-4">
                <h2 class=" col-md-12">Heading</h2>
                <p class=" col-md-12">NT$ 7,640</p>
                <hr>
                <form class=" col-md-12">
                    <div class="form-group">
                        <input type="button" class="btn btn-default form-control" value="加入購物車">
                    </div>
                </form>
                <div class="col-md-12">
                <p><a href="#">查詢有庫存的店鋪 </a> | <a href="#"> 前往聯絡我們表單</a></p>
                <hr>
                <p><a href="#">觀看詳細說明</a></p>
                <hr>
                </div>
                
            </div>
        </div>
    </div>
    <!-- // mv_XR1C2_002_end -->
  <br><br>
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
      <br><br>
    <!-- // mv_form_start -->
    <style>
    form.form-horizontal{
        background-color: #e2e2e2;
        border-radius:4px;
        padding:3% 5% !important;
    }
    form.form-horizontal .form-group{
        margin-bottom: 30px;
    }
    input{
        height:40px;
    }
    </style>
    <div class="container">
  <div class="row">
    <form class="form-horizontal col-md-8 col-md-offset-2">
    <br>
  <p>*為必填項目</p>
    <hr>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 ">姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 ">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 ">身分類別</label>
    <div class="col-sm-10">
      <input type="radio" name="Item" class="radio-inline"> 顧客
      <input type="radio" name="Item" class="radio-inline"> 員工
      <input type="radio" name="Item" class="radio-inline"> 供應商
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 ">您的意見</label>
    <div class="col-sm-10">
        <textarea name="" class="form-control"  id="" cols="30" rows="10"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default form-control">確認送出</button>
    </div>
    <div class="col-sm-5">
    <button type="submit" class="btn btn-default form-control">清除重填</button>
    </div>
    
  </div>
</form>
</div>
  </div>
    <!-- // mv_form_end -->
    <br><br>
    <!-- // mv_footer_start -->
    <style>
    footer{
        background: #e2e2e2;
    }
    </style>
    <footer class="bd-footer text-muted">
    <br>
    <div class="container">
    <div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="menu list-inline">
                        
                    <li>
                    <a href="#">item1</a>
                    </li>
                        
                    <li>
                        <a href="#">item2</a>
                    </li>
                        
                    <li>
                    <a href="#">item3</a>
                    </li>
                        
                    <li>
                        <a href="#">item4 </a>
                    </li>
                        
                    <li>
                    <a href="#">item5</a>
                    </li>
        
            </ul>
        </div>
    <hr>
        <!-- <ul class="bd-footer-links">
        <li><a href="https://github.com/twbs/bootstrap">GitHub</a></li>
        <li><a href="https://twitter.com/getbootstrap">Twitter</a></li>
        <li><a href="/examples/">Examples</a></li>
        <li><a href="/about/history/">About</a></li>
        </ul> -->
        
        <p class="col-md-12">Copyright © MYProject 2017. All right reserved.</p>
    </div>
</footer>

    <!-- // mv_footer_end -->
</body>

</html>