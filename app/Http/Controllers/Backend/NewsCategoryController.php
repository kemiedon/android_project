<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\NewsCategory;

use Session, Validator, Lang;

class NewsCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //parent_record

        $news_categories = NewsCategory::orderBy('order', 'asc')->get();

        $biggest_order   = (count($news_categories) != 0) ? NewsCategory::orderBy('order', 'desc')->first()->order : NULL;
        $smallest_order  = (count($news_categories) != 0) ? NewsCategory::orderBy('order', 'asc') ->first()->order : NULL;

        return view('backend/news_categories/index', compact('news_categories', 'biggest_order', 'smallest_order'));
    }


    public function create()
    {
        //parent_record

        return view('backend/news_categories/create');
    }


    public function store(Request $request)
    {
        //parent_record

        $rules = array(
            //create_validation_rules_start
            'name'         => 'required',
            'check'        => 'required',
            'published_at' => 'required',
            'category'     => 'required',
            'description'  => 'required',
            'picture'      => 'required',
            //create_validation_rules_end
        );

        $nice_names = array(
            //create_validation_nice_names_start
            'name'         => '名稱',
            'check'        => '是否儲存為草稿',
            'published_at' => '發佈日期',
            'category'     => '新聞分類',
            'description'  => '內容',
            'picture'      => '新聞類別圖片',
            //create_validation_nice_names_end
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $news_category               = new NewsCategory;

            // mv_controller_store_start
            $news_category->name    = $request->name;
            $news_category->published_at = $request->published_at;
            $news_category->category     = $request->category;
            $news_category->description  = $request->description;
            $news_category->check        = $request->check;
            // mv_controller_store_end

            $news_category->order        = (NewsCategory::count() != 0) ? NewsCategory::orderBy('order', 'desc')->first()->order + 1 : 1;

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/news_categories')) mkdir('uploads/news_categories', 0755, true);
                $request->file('picture')->move('uploads/news_categories', $filename);
                $news_category->picture = $filename;
            }

            $news_category->save();

            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.news_categories.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //parent_record

        $news_category = NewsCategory::find($id);

        return view('backend/news_categories/edit', compact("news_category"));
    }


    public function update(Request $request, $id)
    {
        //parent_record

        $rules = array(
            //edit_validation_rules_start
            'name' => 'required',
            //edit_validation_rules_end
        );

        $nice_names = array(
            //edit_validation_nice_names_start
            'name' => '欄位名稱',
            //edit_validation_nice_names_end
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $news_category = NewsCategory::find($id);

            // mv_controller_update_start
            $news_category->name    = $request->name;
            $news_category->published_at = $request->published_at;
            $news_category->category     = $request->category;
            $news_category->description  = $request->description;
            $news_category->check        = $request->check;
            // mv_controller_update_end

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/news_categories/'.$news_category->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/news_categories')) mkdir('uploads/news_categories', 0755, true);
                $request->file('picture')->move('uploads/news_categories', $filename);
                $news_category->picture = $filename;
            }

            $news_category->save();

            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.news_categories.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($id)
    {
        //parent_record

        $news_category = NewsCategory::find($id);
        @unlink('uploads/news_categories/'.$news_category->picture);
        $news_category->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.news_categories.index');
    }


    public function move_up($id)
    {
        //parent_record

        $current         = NewsCategory::where('id', '=', $id)->first();
        $current_order   = $current->order;

        $previous        = NewsCategory::where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.news_categories.index');
    }


    public function move_down($id)
    {
        //parent_record

        $current        = NewsCategory::where('id', '=', $id)->first();
        $current_order  = $current->order;

        $next           = NewsCategory::where('order', '>', $current_order)->orderBy('order', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.news_categories.index');
    }
}
