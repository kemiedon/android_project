 <style>
  
</style>
 <!-- mv_side_article_start -->
 <?php $news_categories = DB::table('news_categories')->data_filter; ?>
  <div class="section deco_bg_1">
    <div class="container">
      <div class="row">
        <!-- mv_article_start -->
        <div class="col-md-9 ">
          <!-- start -->
          <div class=" clearfix page-main">
            <div class="col-sm-12">
              <h2>
                <a href="news_page.html">{{ $news_category->$lang.'name' or $news_category->name }}</a>
              </h2>
              <small class="news-date small">
                <i class="fa fa-fw fa-lg s fa-clock-o"></i>{{ $news_category->published_date }}</small>
              <small class="news-tag small">
                <i class="fa fa-fw fa-tags fa-lg"></i>Tags：設計,網頁</small>
              <img src="uploads/news/news_01.jpeg" alt="" width="100%">

              <p class="text-justify">{{ $news_category->$lang.'description' or $news_category->description }}</p>
              <br>
              <br>
              <br>
              
          <!-- end -->
          <div class="col-md-6">
            <a href="" class="btn btn-block btn-info">上一篇</a>
          </div>
          <div class="col-md-6">
            <a href="" class="btn btn-block btn-info">下一篇</a>
          </div>
          <div class="col-md-12">
            <hr>
            <h4>相關文章</h4>
            <div class="media">
              <div class="media-left">
                <img src="uploads/news/news_01.jpeg" class="media-object " style="width:150px">
              </div>
              <div class="media-body">
                <h5 class="media-heading">
                  <a href="">【簡單掌握5個網頁設計原則】</a>
                </h5>
                <p class=" text-justify">
                  <small>
                    您可能會問自己，為什麼要為目前的公司網站換門面？是的，或許目前的網站與競爭對手的網站相較來說是過時了，但一...
                  </small>
                </p>

              </div>
            </div>
            
          </div>
        </div>
        <!-- mv_article_end -->
<script>
  // mv_js_start
  // mv_js_end   
</script>