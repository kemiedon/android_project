
<?php $news_category = DB::table('news_categories')->data_filter; ?>
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
<!-- // mv_FR1C2_start -->
<div class="container-fluid">
    <div class="row">
        <div id="FR1C2_Left" class="col-sm-12 col-md-6 text-center">
            形象圖位置
        </div>
        <div id="FR1C2_Right" class="col-sm-12 col-md-6">

            <div class="col-md-10 col-md-offset-1">
                <h2 style="margin-bottom: 1.25em;">{{ $news_category->{$lang.'_name'} or $news_category->name}}</h2>
                <span class="text-justify">{!! $news_category->{$lang.'_description'} or $news_category->description !!}</span>
            </div>

        </div>
    </div>
</div>
<!-- // mv_FR1C2_end -->
<script>
    $(function() {
        // mv_js_start
        $('#FR1C2_Left').height($('#FR1C2_Right').height());
        // mv_js_end
    })
</script>