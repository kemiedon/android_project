<style>
  
</style>
<!-- mv_hover_block_start -->
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
  <div class="section bg-color deco_bg_3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-info">作品集</h1>
        </div>
      </div>
      <ul class="row list-unstyled" style="background-color:white">
        @foreach($news_categories as $key => $news_category)
        <li class="col-md-3 nopadding parent-relative">
          <div class="children-absolute">
            <a href="#" class="text-success">
              <p>
                <span>{{ $news_category->$lang.'name' or $news_category->name }}</span>
              </p>
            </a>
          </div>
          <img src="images/portfolio_citymove.jpg" width="100%">
        </li>
        @endforeach
        
      </ul>
    </div>
  </div>
  <!-- mv_hover_block_end -->
  <script>
  // mv_js_start
  // mv_js_end   
</script>