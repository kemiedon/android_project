<style>
  
</style>
<!-- mv_slide_col6_start -->
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
  <div class="section deco_bg_1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>網站設計流程</h1>
        </div>
      </div>
      <div class="row ">
        <div class="slider">
          @foreach($news_categories as $news_category)
          <div width="100%">
            <!-- start -->
            <div class="col-md-6">
              <br>
              <img src="images/communication_01.jpg" class="img-responsive">
              <!-- end -->
            </div>
            <div class="col-md-6">
              <h3>{{ $news_category->$lang.'name' or $news_category->name }}</h3>
              <p class="text-justify">
                {!! mb_strimwidth($news_category->$lang.'description', 0, 280, "...","utf-8") !!}/p>
              
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- mv_slide_col6_end -->
<script>
  // mv_js_start
  // mv_js_end   
</script>