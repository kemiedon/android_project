<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\NewsCategory;


class NewsCategoryController extends Controller
{
    function news_category () {

       // mv_R1C2_start
        $news_category = NewsCategory::find(1);
        // mv_R1C2_end

        return view('frontend/news_categories', compact('news_category'));
    }
}
