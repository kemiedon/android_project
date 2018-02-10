
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
    <!-- // mv_navbar_start -->
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
              <!-- // mv_navbar_item_start -->
                <li><a href="{{route( '$nav_item->route_link' )}}">{{ Lang::get('frontend/navbar.label.name') }}</a></li>        
              <!-- // mv_navbar_item_end -->               
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- // mv_navbar_end -->
    <script>
    
    $(document).ready(function(){

  // mv_js_start
    var $header = $('.global-header');

   
    var $hHeight = $header.height();

   
    var prevTop = $(window).scrollTop();

    
    $(window).on('scroll', function(e) {
    st = $(this).scrollTop(); // Set scroll location
    if (st > prevTop && st > $hHeight) { 
        $header.addClass('js-global-header-scrolling');
    } else {
        $header.removeClass('js-global-header-scrolling');
    }
    prevTop = st;
    });
    // mv_js_end
    });
    </script>
    