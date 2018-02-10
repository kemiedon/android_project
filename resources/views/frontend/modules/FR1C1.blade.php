
<?php $news_category = DB::table('news_categories')->find($page_id); ?>
<style>

    #FR1C1 {
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>
<!-- // mv_FR1C1_start -->
<div class="container-fluid">
    <div class="row">
        
        <div id="FR1C1" class="container">

            <div class="col-md-12">
                <h2 style="margin-bottom: 1.25em;">{{ $news_category->{$lang.'_name'} or $news_category->name}}</h2>
                <span class="text-justify">{!! $news_category->{$lang.'_description'} or $news_category->description !!}</span>
            </div>

        </div>
    </div>
</div>
<!-- // mv_FR1C1_end -->
<script>
    // mv_js_start
    // mv_js_end   
</script>