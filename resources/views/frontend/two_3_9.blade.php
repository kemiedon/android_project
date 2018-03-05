<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
            @include('frontend/modules/head') 
    </head>
 <body>
        <?php $lang = (!in_array(Request::segment(1), [$lang_data])) ? 'tw' : Request::segment(1);  ?>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       <header>

       </header>
       <section id="Content">
           <div class="container">
                <div class="row">
                    <div id="left" class="col-xs-1 col-md-3 mr-5" style="background-color:#58c5f3; height:200px"></div>   
                    <div id="right" class="col-xs-1 col-md-9" style="background-color:#b87eeb; height:200px"></div>     
                </div>
           </div>
       </section>
       @include('frontend/modules/footer')
    </body>
</html>