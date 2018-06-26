<style>
.HeaderTop {
  position: absolute;
  left: 0px;
  top:310px;
  z-index: 1000;
  width: 100%;
  height: 59px;
  background: url(../images/header/phone_primary_navi_bg.png) no-repeat center center;
}
#Logo {
  width: 283px;
  height: 72px;
  float: none;
  position: relative;
  margin: auto;
  background: url(../images/logo.png) no-repeat center center;
}
#Logo a,#MenuIcon a{
  display: block;
  width: 100%;
  height: 100%;
}
#MenuIcon {
  position: absolute;
  right: 5px;
  top: 8px;
  width: 40px;
  height: 40px;
  background: url(../images/header/menu_icon.png) no-repeat center center;
}

#MenuIcon>a {
  display: block;
}

#PrimaryNavigation {
  display: none;
  margin-top: -12px;
  background-color: #fdf5d3;
}
#PrimaryNavigation>ul{
  background: url(../images/bg/phone_primary_bg.png) no-repeat center center;
  padding-top: 25px;
}
#PrimaryNavigation>ul>li {
  float: none;
  text-align: center;
  height: 50px;
  line-height: 45px;
  background-repeat: no-repeat;
  background-position: center center;
}
#PrimaryNavigation>ul>li>a {
  width: 100%;
  height: 100%;
  display: block;
}
#PrimaryNavigationItem01{
  background-image: url(../images/header/phone_primary_navi_01.png);
}
#PrimaryNavigationItem02{
  background-image: url(../images/header/phone_primary_navi_02.png);
}
#PrimaryNavigationItem03{
  background-image: url(../images/header/phone_primary_navi_03.png);
}
#PrimaryNavigationItem04{
  background-image: url(../images/header/phone_primary_navi_04.png);
}

</style>
    <!-- // mv_navbar_start -->
    <div class="cover">
    <div class="navbar" id="header">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand pull-right" href="index.html">
            <span>
              <img src="images/logo.svg" alt="MACROVIZ">
            </span>
          </a>

        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">

            <!-- // mv_navbar_item_start -->
                <li><a href="{{route( '$nav_item->route_link' )}}">{{ Lang::get('frontend/navbar.label.name') }}</a></li>        
              <!-- // mv_navbar_item_end -->     
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-success service-item">
            <span>打造最適合您行銷方案的網站</span>
            <span>協助您優化網站帶來收益</span>
            <span>給您最容易使用的管理介面</span>
          </h1>
          <p class="text-success">我們將協助您優化網站帶來收益</p>
          <br>

          <div class="col-sm-4 col-sm-offset-4">
            <a class="btn cta-btn btn-default btn-info">
              <span>
                <i class="fa  fa-fw fa-hand-o-right text-success"></i> 了解更多</span>
            </a>
          </div>

        </div>
      </div>
    </div>
    <div class="cover-image" id="demo-1" data-zs-overlay="false" data-zs-src='["images/index_banner_01.jpg", "images/index_banner_02.jpg",  "images/index_banner_04.jpg"]'
      data-zs-bullets="false">
      <div class="demo-inner-content">
      </div>
    </div>
  </div>
    
    <!-- // mv_navbar_end -->
  </header>