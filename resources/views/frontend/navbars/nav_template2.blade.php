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
<header class="HeaderTop">
    <div id="Logo"><a href="#"></a></div>
    <div id="MenuIcon">
      <a href="javascript:void(0)"></a>
    </div>
    <!-- // mv_navbar_start -->
    <nav id="PrimaryNavigation" class="down">
      <ul>
        <!-- // mv_navbar_item_start -->
        <li id="PrimaryNavigationItem01"><a href="{{route( '$nav_item->route_link' )}}">{{ Lang::get('frontend/navbar.label.name') }}</a></li>
        <!-- // mv_navbar_item_end -->
      </ul>
    </nav>
    <!-- // mv_navbar_end -->
  </header>