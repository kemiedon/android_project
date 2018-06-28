<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Team;
use App\Http\Models\Milestone;

use Session, Validator, Lang;

class MilestoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($team_id)
    {
        $team = Team::where('id', $team_id)->first();
        
        $milestone = Milestone::where('team_id', $team_id)->orderBy('created_at', 'asc')->get();
        $total_rows = count($milestone);
        return view('backend/milestone/index', compact('team', 'milestone' , 'total_rows'));
    }


    public function create($team_id)
    {
        $team = Team::where('id', $team_id)->first();

        return view('backend/milestone/create', compact('team'));
    }


    public function store(Request $request, $team_id)
    {
        $team = Team::where('id', $team_id)->first();

        $rules = array(
        'id' => 'null', 
        'name' => 'required', 
        'order' => 'null', 
        );

        $nice_names = array(
        'id' => '', 
        'name' => '', 
        'order' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $milestone               = new Milestone;

        $milestone->name = $request->name;
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/milestone')) mkdir('uploads/milestone', 0755, true);
                $request->file('picture')->move('uploads/milestone', $filename);
                $milestone->picture = $filename;
            }

            $milestone->save();

            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.milestone.index', compact('team'));
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($milestone_id)
    {
        //
    }


    public function edit($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();

        $milestone = Milestone::find($milestone_id);

        return view('backend/milestone/edit', compact('team', "milestone"));
    }


    public function update(Request $request, $team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();

        $rules = array(
        'id' => 'null', 
        'name' => 'required', 
        'order' => 'null', 
        );

        $nice_names = array(
        'id' => '', 
        'name' => '', 
        'order' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $milestone = Milestone::find($milestone_id);

        $milestone->name = $request->name;

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/milestone/'.$milestone->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/milestone')) mkdir('uploads/milestone', 0755, true);
                $request->file('picture')->move('uploads/milestone', $filename);
                $milestone->picture = $filename;
            }

            $milestone->save();

            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.milestone.index', compact('team'));
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();

        $milestone = Milestone::find($milestone_id);
        @unlink('uploads/milestone/'.$milestone->picture);
        $milestone->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.milestone.index', compact('team'));
    }


    public function move_up($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();

        $current         = Milestone::where('team_id', $team_id)->where('id', '=', $milestone_id)->first();
        $current_order   = $current->order;

        $previous        = Milestone::where('team_id', $team_id)->where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.milestone.index', compact('team'));
    }


    public function move_down($team_id, $milestone_id)
    {
        $team = Team::where('id', $team_id)->first();

        $current        = Milestone::where('team_id', $team_id)->where('id', '=', $milestone_id)->first();
        $current_order  = $current->order;

        $next           = Milestone::where('team_id', $team_id)->where('order', '>', $current_order)->orderBy('created_at', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.milestone.index', compact('team'));
    }
}
