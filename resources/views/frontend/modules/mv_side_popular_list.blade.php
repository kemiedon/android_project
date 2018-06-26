<style>
  
</style>
<!-- mv_side_popular_list_start -->
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
          <hr>
          <h4>熱門文章</h4>
          <ol class="list-unstyled popular-list">
            @foreach($news_categories as $key => $news_category)
            <li>
              <span>{{$key}}</span>{{ $news_category->$lang.'name' or $news_category->name }}</li>
            @endforeach
          </ol>
          <!-- mv_side_popular_list_end -->
<script>
  // mv_js_start
  // mv_js_end   
</script>