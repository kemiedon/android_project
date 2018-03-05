
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
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
    <!-- // mv_XR1C2_start -->
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
    <!-- // mv_XR1C2_end -->
    <script>
        $(function() {
            // mv_js_start
            $('#XR1C2_Left').height($('#XR1C2_Right').height());
            // mv_js_end   
        })
    </script>

    