<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Team;

use Session, Validator, Lang;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        
        $team = Team::orderBy('order', 'asc')->get();
        $total_rows = count($team);
        $biggest_order   = (count($team) != 0) ? Team::orderBy('order', 'desc')->first()->order : NULL;
        $smallest_order  = (count($team) != 0) ? Team::orderBy('order', 'asc') ->first()->order : NULL;
        return view('backend/team/index', compact('team', 'biggest_order', 'smallest_order', 'total_rows'));
    }


    public function create()
    {
        

        return view('backend/team/create');
    }


    public function store(Request $request)
    {
        

        $rules = array(
        'id' => 'required', 
        'picture' => 'required', 
        'name' => 'required', 
        'description' => 'null', 
        'score' => 'required', 
        );

        $nice_names = array(
        'id' => '', 
        'picture' => '', 
        'name' => '', 
        'description' => '', 
        'score' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $team               = new Team;

        $team->picture = $request->picture;
        $team->name = $request->name;
        $team->subject = $request->subject;
        $team->description = $request->description;
        $team->score = $request->score;
            $team->order        = (Team::count() != 0) ? Team::orderBy('order', 'desc')->first()->order + 1 : 1;
            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/team')) mkdir('uploads/team', 0755, true);
                $request->file('picture')->move('uploads/team', $filename);
                $team->picture = $filename;
            }

            $team->save();

            Session::flash('message', Lang::get('app.message.success.store'));
            return redirect()->route('admin.team.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function show($team_id)
    {
        //
    }


    public function edit($team_id)
    {
        

        $team = Team::find($team_id);

        return view('backend/team/edit', compact("team"));
    }


    public function update(Request $request, $team_id)
    {
        

        $rules = array(
        'id' => 'required', 
        'picture' => 'required', 
        'name' => 'required', 
        'description' => 'null', 
        'score' => 'required', 
        );

        $nice_names = array(
        'id' => '', 
        'picture' => '', 
        'name' => '', 
        'description' => '', 
        'score' => '', 
        );

        $request->merge(array_map('trim', $request->all()));
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nice_names);

        if ($validator->passes())
        {
            $team = Team::find($team_id);

        $team->picture = $request->picture;
        $team->name = $request->name;
        $team->subject = $request->subject;
        $team->description = $request->description;
        $team->score = $request->score;

            if($request->hasFile('picture') && $request->file('picture')->isValid()) {
                @unlink('uploads/team/'.$team->picture);
                $filename = rand(00000000, 99999999).".".$request->file('picture')->getClientOriginalExtension();
                if (!file_exists('uploads')) mkdir('uploads', 0755, true);
                if (!file_exists('uploads/team')) mkdir('uploads/team', 0755, true);
                $request->file('picture')->move('uploads/team', $filename);
                $team->picture = $filename;
            }

            $team->save();

            Session::flash('message', Lang::get('app.message.success.update'));
            return redirect()->route('admin.team.index');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function destroy($team_id)
    {
        

        $team = Team::find($team_id);
        @unlink('uploads/team/'.$team->picture);
        $team->delete();
        Session::flash('message', Lang::get('app.message.success.destroy'));
        return redirect()->route('admin.team.index');
    }


    public function move_up($team_id)
    {
        

        $current         = Team::where('id', '=', $team_id)->first();
        $current_order   = $current->order;

        $previous        = Team::where('order', '<', $current_order)->orderBy('order', 'desc')->first();
        $previous_order  = $previous->order;

        $current->order  = $previous_order;
        $previous->order = $current_order;

        $current->save();
        $previous->save();

        return redirect()->route('admin.team.index');
    }


    public function move_down($team_id)
    {
        

        $current        = Team::where('id', '=', $team_id)->first();
        $current_order  = $current->order;

        $next           = Team::where('order', '>', $current_order)->orderBy('order', 'asc')->first();
        $next_order     = $next->order;

        $current->order = $next_order;
        $next->order    = $current_order;

        $current->save();
        $next->save();

        return redirect()->route('admin.team.index');
    }
}
