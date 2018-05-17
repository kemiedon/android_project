<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
            @include('frontend/master_parts/head') 
    </head>
 <body>
        <?php $lang = (!in_array(Request::segment(1), [$lang_data])) ? 'tw' : Request::segment(1);  ?>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       <header>
        <!-- // mv_header_start -->
        <!-- // mv_header_end -->
       </header>
       <section id="Content">
           <div class="container">
                <div class="row">
                    <div id="left" class="col-xs-1 col-md-3 mr-5">
                        <!-- // mv_left_start -->
                        <!-- // mv_left_end -->
                    </div>   
                    <div id="right" class="col-xs-1 col-md-9">
                        <!-- // mv_right_start -->
                        <!-- // mv_right_end -->
                    </div>
                </div>
           </div>
       </section>
       <!-- // mv_footer_start -->
       @include('frontend/modules/footer')
       <!-- // mv_footer_end -->
       @include('frontend/master_parts/js_files')
    </body>
</html>