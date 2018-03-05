<style>
#ProductCategoriesList{
  margin-bottom: 40px;
  padding-left: 0px;
}
#ProductCategoriesList>li{
  font-size: 1.5em;
  line-height: 2em;
  width: 100%;
  height: 50px;
  letter-spacing: 3px;
  font-family: Hiragino Mincho Pro;
  text-align: left;
  color: #40210F;
  border-bottom: 1px dotted #ffc7a6;
}
#ProductCategoriesList>li.current{
  font-weight:bold;
}
</style>
<!-- // mv_category_start -->
<div class="col-xs-12 col-sm-3">
        <h4 class="PageTitle ProductPageTitle">
          <span class="sr-only">Heading</span>
        </h4>
        <ol id="ProductCategoriesList">
            @foreach($news_categories as $news_category)
            <li>
            <a href="{{ route('news_categories', [$news_category->id]) }}">{{ $news_category->$lang.'category' }}</a>
            </li>
            @endforeach
        </ol>
</div>
<!-- // mv_category_end -->
<script>
 $function(){
     // mv_js_start
     $('#ProductCategoriesList li a').click(function(){
        $('#ProductCategoriesList li.current').removeClass('current');
        $(this).closest('li').addClass('current');
     });
     // mv_js_end
 }

</script>