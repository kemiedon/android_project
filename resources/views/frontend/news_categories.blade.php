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
    <div class="container-fluid" style="background-color:#FFFFFF;">

        <!-- // mv_FR1C2_start -->
        <?php $news_category = DB::table('news_categories')->find(1); ?>
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
        <div class="row">
            <div id="XR1C2_Left" class="col-sm-12 col-md-4 col-md-offset-2 text-center">
                形象圖位置
            </div>
            <div id="XR1C2_Right" class="col-sm-12 col-md-4">
                <div class="col-md-10 col-md-offset-1">
                    <h2 style="margin-bottom: 1.25em;">{{ $news_category->name }}</h2>
                    <span class="text-justify">{!! $news_category->description !!}</span>
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

        <div class="row">
            <h2 class="col-md-12 text-center" style="margin-bottom: 1.25em;">營業項目</h2>

            <div class="col-md-offset-2">

                @foreach($news_categories as $news_category)
                <div class="col-md-2 XR1C4">
                    <div class="text-center">圖片位置</div>
                    <h3 class="text-left">{{ $news_category->name }}</h3>
                    <span class="text-justify">{!! substr($news_category->description, 3, 253) !!}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- // mv_XR1C4_end -->


    </div>
</body>

</html>