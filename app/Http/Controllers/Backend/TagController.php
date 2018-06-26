<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Tag;

use Session, Validator, Lang;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        
        $tags = Tag::orderBy('order', 'asc')->get();
        $total_rows = count($tags);
        $biggest_order   = (count($tags) != 0) ? Tag::orderBy('order', 'desc')->first()->order : NULL;
        $smallest_order  = (count($tags) != 0) ? Tag::orderBy('order', 'asc') ->first()->order : NULL;
        return view('backend/tags/index', compact('tags', 'biggest_order', 'smallest_order', 'total_rows'));
    }


    public function create()
    {
        

        return view('backend/tags/create');
    }


    public function store(Request $request)
    {
        

        $rules = array(
        'tw_category' => 'required', 
        );

        $nice_names = array(
        'tw_category' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $tag               = new Tag;

        $tag->tw_category = $request->tw_category;
            $tag->order        = (Tag::count() != 0) ? Tag::orderBy('order', 'desc')->first()->order + 1 : 1;
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/tags')) mkdir('uploads/tags', 0755, true);
                $request->file('picture')->move('uploads/tags', $filename);
                $tag->picture = $filename;
            }

            $tag->save();

            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.tags.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($tag_id)
    {
        //
    }


    public function edit($tag_id)
    {
        

        $tag = Tag::find($tag_id);

        return view('backend/tags/edit', compact("tag"));
    }


    public function update(Request $request, $tag_id)
    {
        

        $rules = array(
        'tw_category' => 'required', 
        );

        $nice_names = array(
        'tw_category' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $tag = Tag::find($tag_id);

        $tag->tw_category = $request->tw_category;

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/tags/'.$tag->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/tags')) mkdir('uploads/tags', 0755, true);
                $request->file('picture')->move('uploads/tags', $filename);
                $tag->picture = $filename;
            }

            $tag->save();

            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.tags.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($tag_id)
    {
        

        $tag = Tag::find($tag_id);
        @unlink('uploads/tags/'.$tag->picture);
        $tag->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.tags.index');
    }


    public function move_up($tag_id)
    {
        

        $current         = Tag::where('id', '=', $tag_id)->first();
        $current_order   = $current->order;

        $previous        = Tag::where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.tags.index');
    }


    public function move_down($tag_id)
    {
        

        $current        = Tag::where('id', '=', $tag_id)->first();
        $current_order  = $current->order;

        $next           = Tag::where('order', '>', $current_order)->orderBy('order', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.tags.index');
    }
}
