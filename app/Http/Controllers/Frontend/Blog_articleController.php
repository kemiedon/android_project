<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Blog_article;
use App\Http\Models\Blog_tag;
use App\Http\Models\Tag;
use stdClass;
class Blog_articleController extends Controller
{
    public function index () {
        $blog_articles = Blog_article::orderBy('order','asc')->paginate(10);
        $tags = Tag::all();
        $popular_articles = Blog_article::orderBy('clicks','desc')->take(3)->get();

        return view('frontend/article_list', compact('blog_articles','tags', 'popular_articles'));
    }
    public function content ($article_id) {
        $article = Blog_article::find($article_id);
        $tags = Tag::all();
        $popular_articles = Blog_article::orderBy('clicks','desc')->take(3)->get();

        $filter_articles = Blog_tag::where('tag_id',$article->tags[0]->tag_id)->get();
        foreach($filter_articles as $one_article){
            if($one_article->blogs != null && $one_article->blogs->id != $article_id)
                $related_articles[] = $one_article->blogs;
            else{
                $related_articles = Blog_article::orderBy('order','desc')->take(3)->get();  
            }
        }     
        if($filter_articles == null){
            $related_articles = Blog_article::orderBy('order','desc')->take(3)->get();
        }
        return view('frontend/article', compact('article','tags', 'popular_articles','related_articles'));
    }
    public function tag_filter ($tag_id) {
        $blog_articles = Blog_tag::where('tag_id', $tag_id)->get();
        
        $tags = Tag::all();
        $popular_articles = Blog_article::orderBy('clicks','desc')->take(3)->get();
        
        return view('frontend/tag_list', compact('blog_articles','tags', 'popular_articles'));
    }
}
