<style>
  
</style>
          <!-- mv_side_tag_start -->
          <?php $news_categories = DB::table('news_categories')->data_filter; ?>
          <hr>
          <h4>標籤</h4>
          @foreach($news_categories as $news_category)
          <a class="btn btn-default btn-sm">{{ $news_category->$lang.'category' or $news_category->category }}</a>
          @endforeach
          <!-- mv_side_tag_end -->
<script>
  // mv_js_start
  // mv_js_end   
</script>