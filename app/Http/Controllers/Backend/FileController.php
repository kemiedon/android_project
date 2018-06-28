<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Team;
use App\Http\Models\Milestone;
use App\Http\Models\File;

use Session, Validator, Lang;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();
        
        $files = File::where('milestone_id', $milestone_id)->orderBy('created_at', 'asc')->get();
        $total_rows = count($files);
        return view('backend/files/index', compact('team', 'milestone', 'files' , 'total_rows'));
    }


    public function create($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        return view('backend/files/create', compact('team', 'milestone'));
    }


    public function store(Request $request, $team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $rules = array(
        'id' => 'required', 
        'file' => 'required', 
        );

        $nice_names = array(
        'id' => '', 
        'file' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $file               = new File;

        $file->file = $request->file;
        $file->file2 = $request->file2;
        $file->file3 = $request->file3;
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/files')) mkdir('uploads/files', 0755, true);
                $request->file('picture')->move('uploads/files', $filename);
                $file->picture = $filename;
            }

            $file->save();

            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.files.index', compact('team', 'milestone'));
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($file_id)
    {
        //
    }


    public function edit($team_id, $milestone_id, $file_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $file = File::find($file_id);

        return view('backend/files/edit', compact('team', 'milestone', "file"));
    }


    public function update(Request $request, $team_id, $milestone_id, $file_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $rules = array(
        'id' => 'required', 
        'file' => 'required', 
        );

        $nice_names = array(
        'id' => '', 
        'file' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $file = File::find($file_id);

        $file->file = $request->file;
        $file->file2 = $request->file2;
        $file->file3 = $request->file3;

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/files/'.$file->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/files')) mkdir('uploads/files', 0755, true);
                $request->file('picture')->move('uploads/files', $filename);
                $file->picture = $filename;
            }

            $file->save();

            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.files.index', compact('team', 'milestone'));
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($team_id, $milestone_id, $file_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $file = File::find($file_id);
        @unlink('uploads/files/'.$file->picture);
        $file->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.files.index', compact('team', 'milestone'));
    }


    public function move_up($team_id, $milestone_id, $file_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $current         = File::where('milestone_id', $milestone_id)->where('id', '=', $file_id)->first();
        $current_order   = $current->order;

        $previous        = File::where('milestone_id', $milestone_id)->where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.files.index', compact('team', 'milestone'));
    }


    public function move_down($team_id, $milestone_id, $file_id)
    {
        $team = Team::where('id', $team_id)->first();
      $milestone = Milestone::where('id', $milestone_id)->first();

        $current        = File::where('milestone_id', $milestone_id)->where('id', '=', $file_id)->first();
        $current_order  = $current->order;

        $next           = File::where('milestone_id', $milestone_id)->where('order', '>', $current_order)->orderBy('created_at', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.files.index', compact('team', 'milestone'));
    }
}
