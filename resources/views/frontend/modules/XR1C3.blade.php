
<style>
        .XR1C3 h3{
            font-size: 0.8em;
        }
        .XR1C3>a:hover{
            text-decoration: none;
            color:#999;
        }
        .XR1C3>a>div>div:first-child {
            height: 250px;
            color: #999;
            /* padding: 3% 5%; */
            margin-bottom: 20px
        }
        
        @media(min-width:992px) {
            .XR1C3:first-child {
                /* padding-left: 0px; */
            }
            .XR1C3:nth-child(3n) {
                /* padding-right: 0px; */
            }
            .XR1C3>a{
                display: block;
                width:100%;
                height:100%;
            }
            .XR1C3>a>div>div{
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.07)
            }
            .XR1C3>a>div>div:first-child.BoxShadow{
                box-shadow: 0 5px 10px 0 rgba(0,0,0,.07);
                /* margin-bottom:25px; */
            }
        }
    </style>
    <!-- // mv_XR1C3_start -->
    <?php $news_categories = DB::table('news_categories')->data_filter; ?>
    <div class="container ">
        <div class="row">
            <h2 class="col-md-12 text-center" style="margin-bottom: 1.25em;">最新消息</h2>
            @foreach($news_categories as $news_category)
            <div class="col-md-4 XR1C3">
                <a href="#">
                    <div>
                         <div class="text-center">圖片位置</div>
                    
                        <p><span>2017.10.19</span></p>
                        <h3 class="text-left">{{ $news_category->$lang.'name' }}</h3>
                        <p><span class="text-justify">{!! substr($news_category->$lang.'description', 3, 253) !!}</span></p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
     <!-- // mv_XR1C3_end -->
    <script>
    $(document).ready(function(){
        // mv_js_start
        $('.XR1C3>a').hover(function(){
            $(this).animate({'margin-top':'-5px'},400);
            $(this).find('div').addClass('BoxShadow');
        },function(){
            $(this).animate({'margin-top':'0px'},400);
            $(this).find('div').removeClass('BoxShadow');
        });
        // mv_js_end
    });
    </script>
   