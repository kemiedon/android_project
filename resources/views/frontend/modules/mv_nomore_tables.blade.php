<style>
  @media only screen and (max-width: 800px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}
</style>
<!-- mv_nomore_tables_start -->
<?php $news_categories = DB::table('news_categories')->data_filter; ?>
		<div class="col-md-12">
            <h1 class="text-center">
                中華亞太蜂針研究會
            </h1>
            <h3 class="text-center">
                服務處一覽表
            </h3>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>姓名</th>
        				<th>電話</th>
        				<th>地址</th>
        			</tr>
        		</thead>
        		<tbody>
					@foreach($news_categories as $news_category)
        			<tr>
        				<td data-title="姓名">{{ $news_category->$lang.'name' or $news_category->name }}</td>
        				<td data-title="電話">{{ $news_category->$lang.'phone' or $news_category->phone }}</td>
        				<td data-title="地址">{{ $news_category->$lang.'address' or $news_category->address }}</td>
					</tr>
				    @endforeach  			
        		</tbody>
			</table>
		</div>
<!-- mv_nomore_tables_end -->
<script>
  // mv_js_start
  // mv_js_end   
</script>