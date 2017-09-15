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


    <!-- // mv_FR1C2_start -->
    <style>
        #FR1C2_Left {
            background-color: #f6f6f6;
            padding-top: 50px;
            padding-bottom: 50px;
            display: inline-block;
            color: #999;
            background-image: url('{{ asset("images/img_placeholder.jpg") }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        #FR1C2_Right {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div id="FR1C2_Left" class="col-sm-12 col-md-6 text-center">
                <span class="">形象圖位置</span>
            </div>
            <div id="FR1C2_Right" class="col-sm-12 col-md-4 col-md-offset-1 text-left">
                <h2>{{ $news_category->name }}</h2><br/>
                <p>{!! $news_category->description !!}</p>
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
            padding-top: 50px;
            padding-bottom: 50px;
            display: inline-block;
            color: #999;
            background-image: url('{{ asset("images/img_placeholder.jpg") }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        #XR1C2_Right {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div id="XR1C2_Left" class="col-sm-12 col-md-6 text-center">
                <span class="">形象圖位置</span>
            </div>
            <div id="XR1C2_Right" class="col-sm-12 col-md-4 col-md-offset-1 text-left">
                <h2>{{ $news_category->name }}</h2><br/>
                <p>{!! $news_category->description !!}</p>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#XR1C2_Left').height($('#XR1C2_Right').height());
        })
    </script>
    <!-- // mv_XR1C2_end -->



</body>

</html>