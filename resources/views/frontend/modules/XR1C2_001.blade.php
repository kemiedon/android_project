
<style>
        .XR1C2_001 h4{
            margin-bottom: 40px;
        }
        .XR1C2_001:last-child{
            padding-right:0px;
        }
        .XR1C2_001>.BGI{
            display: block;
            width:100%;
            height:100%;
            background-color: #f6f6f6;
            
        }
        h4{
        font-size: 40px;
        }
        a{
        color:black;
        }
        .XR1C2_001:first-child ul{
            list-style-type: none;
            padding-left:15%;
            padding-right:10%;
        }
        .XR1C2_001 ul>li{
            border-bottom:1px solid #e2e2e2;
        }
        .XR1C2_001 ul>li:last-child{
            border:none;
        }
    </style>
    <!-- // mv_XR1C2_001_start -->
    <?php $news_categories = DB::table('news_categories')->data_filter; ?>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-6 XR1C2">
      <h4 class="col-md-12">最新消息</h4>
      <ul>
        <li>
          <a href="">
          <!-- 騰資料 -->
            <span>data</span><span>category</span>
            <p>content</p>
          </a>
        </li>
    
      </ul>
    </div>
    <div class="col-md-6 RightCol XR1C2">
    <div class="BGI"></div>
    </div>
  </div>
</div>
    <!-- // mv_XR1C2_001_end -->
    <script>
        // mv_js_start
        // mv_js_end   
       </script>