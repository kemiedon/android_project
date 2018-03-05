<?php $news_categories = DB::table('news_categories')->data_filter; ?>
<style>
        .col-md-8>div{
            background-color: #e2e2e2;
            width: 100%;
            height: 100%;
        }
        </style>
        <!-- // mv_XR1C2_002_start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div><img src="img_path" alt=""></div>
                </div>
                <div class="col-md-4">
                    <h2 class=" col-md-12">Heading</h2>
                    <p class=" col-md-12">NT$ price</p>
                    <hr>
                    <form class=" col-md-12">
                        <div class="form-group">
                            <input type="button" class="btn btn-default form-control" value="加入購物車">
                        </div>
                    </form>
                    <div class="col-md-12">
                    <p><a href="{{route('store')}}">查詢有庫存的店鋪 </a> | <a href="{{route('contact')}}"> 前往聯絡我們表單</a></p>
                    <hr>
                    <p><a href="{{route('detail')}}">觀看詳細說明</a></p>
                    <hr>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- // mv_XR1C2_002_end -->
        <script>
            // mv_js_start
            // mv_js_end   
           </script>