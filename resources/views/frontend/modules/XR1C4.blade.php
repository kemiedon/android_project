

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
<!-- // mv_XR1C4_start -->
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
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
<script>
    // mv_js_start
    // mv_js_end   
   </script>