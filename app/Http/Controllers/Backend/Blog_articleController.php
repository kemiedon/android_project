<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Models\Blog_article;
use App\Http\Models\Blog_tag;
use App\Http\Models\Tag;
use Session, Validator, Lang;

class Blog_articleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        
        $blog_articles = Blog_article::orderBy('order', 'asc')->get();

        $total_rows = count($blog_articles);
        $biggest_order   = (count($blog_articles) != 0) ? Blog_article::orderBy('order', 'desc')->first()->order : NULL;
        $smallest_order  = (count($blog_articles) != 0) ? Blog_article::orderBy('order', 'asc') ->first()->order : NULL;
        return view('backend/blog_articles/index', compact('blog_articles', 'biggest_order', 'smallest_order', 'total_rows'));
    }


    public function create()
    {
        $tags = Tag::all(['id', 'tw_category'])->toArray();
        return view('backend/blog_articles/create',compact('tags'));
    }


    public function store(Request $request)
    {
        

        $rules = array(
        'published_date' => 'required', 
        'tw_name' => 'required', 
        'tw_intro' => 'required', 
        'tw_description' => 'required', 
        );

        $nice_names = array(
        'published_date' => '', 
        'tw_name' => 'required', 
        'tw_intro' => 'required', 
        'tw_description' => '', 
        );

        $request->merge(array_map('trim', $request->except(['tags'])));
        $validator = Validator::make($request->except(['tags']), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $blog_article               = new Blog_article;
   
            $blog_article->published_date = $request->published_date;
            $blog_article->tw_name = $request->tw_name;
            $blog_article->tw_intro = $request->tw_intro;
            $blog_article->tw_description = $request->tw_description;
            $blog_article->link = $request->link;
            $blog_article->order        = (Blog_article::count() != 0) ? Blog_article::orderBy('order', 'desc')->first()->order + 1 : 1;
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads/blog_articles')) mkdir('uploads/blog_articles', 0755, true);
                if (!file_exists('uploads/blog_articles/small')) mkdir('uploads/blog_articles/small', 0755, true);
                $request->file('picture')->move('uploads/blog_articles', $filename);
                $img = Image::make('uploads/blog_articles/'.$filename)->resize(200,150,function($constraint)
				{
				    $constraint->aspectRatio();
				})->save('uploads/blog_articles/small/'.$filename);
                $blog_article->picture = $filename;
            }

            $blog_article->save();  
            $article_id = $blog_article->id;
            
            foreach ($request->tags as $i => $tag_id) {
				$blog_tag          = new Blog_tag;
				$blog_tag->blog_article_id = $article_id;
                $blog_tag->tag_id  = $tag_id->tag_id;
                $blog_tag->created_at = date('Y-m-d H:i:s');
				$blog_tag->save();
			}
            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.blog_articles.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($blog_article_id)
    {
        //
    }


    public function edit($blog_article_id)
    {
        
        $tags = Tag::all(['id', 'tw_category'])->toArray();
        
        $blog_article = Blog_article::find($blog_article_id);
        $tags_id[] = null;
        foreach($blog_article->tags as $tag){
            $tags_id[] = $tag->tag_id;
        }
        return view('backend/blog_articles/edit', compact("blog_article","tags","tags_id"));
    }


    public function update(Request $request, $blog_article_id)
    {
        

        $rules = array(
        'published_date' => 'required', 
        'tw_name' => 'required', 
        'tw_intro' => 'required', 
        'tw_description' => 'required', 
        );

        $nice_names = array(
        'published_date' => '', 
        'tw_name' => 'required', 
        'tw_intro' => 'required', 
        'tw_description' => '', 
        );

        $request->merge(array_map('trim', $request->except(['tags'])));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $blog_article = Blog_article::find($blog_article_id);
            $tags = $request->tags;
            $blog_article->published_date = $request->published_date;
            $blog_article->tw_name = $request->tw_name;
            $blog_article->tw_intro = $request->tw_intro;
            $blog_article->tw_description = $request->tw_description;
            $blog_article->link = $request->link;
           
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/blog_articles/'.$blog_article->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                $request->file('picture')->move('uploads/blog_articles', $filename);
                $img = Image::make('uploads/blog_articles/'.$filename)->resize(200,150,function($constraint)
				{
				    $constraint->aspectRatio();
				})->save('uploads/blog_articles/small/'.$filename);
                $blog_article->picture = $filename;
            }

            $blog_article->save();

            $blog_tags = Blog_tag::where('blog_article_id', $blog_article_id)->get();

            //刪除舊tag
            foreach($blog_tags as $blog_tag){
                $blog_tag->delete();
            }
            //加入新tag
            for($i = 0; $i < count($tags); $i++){
                $blog_tag              = new Blog_tag;
                $blog_tag->blog_article_id = $blog_article_id;
                $blog_tag->tag_id = $tags[$i];
                $blog_tag->created_at = date('Y-m-d H:i:s');
                $blog_tag->save();
            }
            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.blog_articles.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($blog_article_id)
    {
        

        $blog_article = Blog_article::find($blog_article_id);
        $blog_tags = Blog_tag::where('blog_article_id',$blog_article_id);
        //刪除舊tag
        foreach($blog_tags as $blog_tag){
            $blog_tag->delete();
        }
        @unlink('uploads/blog_articles/'.$blog_article->picture);
        $blog_article->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.blog_articles.index');
    }


    public function move_up($blog_article_id)
    {
        

        $current         = Blog_article::where('id', '=', $blog_article_id)->first();
        $current_order   = $current->order;

        $previous        = Blog_article::where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.blog_articles.index');
    }


    public function move_down($blog_article_id)
    {
        

        $current        = Blog_article::where('id', '=', $blog_article_id)->first();
        $current_order  = $current->order;

        $next           = Blog_article::where('order', '>', $current_order)->orderBy('order', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.blog_articles.index');
    }
}
