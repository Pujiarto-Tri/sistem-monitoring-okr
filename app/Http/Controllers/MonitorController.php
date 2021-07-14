<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MonitorContorller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Models\Keyresult;
use App\Models\Objective;
use App\Models\Team;
use App\Models\Task;
use App\Models\Deadline;
use App\Providers\MonitoringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth',['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {   

        $team = Team::where('id',$team->id)->first();

        $objective = Objective::with('keyresult')
                        ->where('team_id',$team->id)
                        ->get();
                        
        $objective = Objective::with('task')
                        ->where('team_id',$team->id)
                        ->get();

        $objective = Objective::with('deadline')
                        ->where('team_id',$team->id)
                        ->get();
        
        return view('/sistem/monitor/index', compact('objective','team'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team)
    {
        $team = Team::where('id',$team->id)->first();
        return view('/sistem/monitor/objective/new_objective',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team)
    {
        $team = Team::where('id',$team->id)->first();
        $request->validate([
            'objective_name' => 'required',
            
        ]);
        $objective = new Objective();
        $objective->objective_name = $request->objective_name;
        $objective->objective_details = $request->objective_details;
        $objective->team_id = $team->id;
        $objective->save();

        $deadline = new Deadline();
        $deadline->objective_id = $objective->id;
        $deadline->date = $request->date;
        $deadline->until = $request->until;
        $deadline->save();

        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Objective Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Objective $objective, Keyresult $keyresult, Task $task)
    {
        //
        $team = Team::where('id',$team->id)->first();

        $objective = Objective::where('id',$objective->id)->first();

        $keyresult = Keyresult::select('keyresult_name')
                        ->where('objective_id',$objective->id)
                        ->get();
        
        $task = Task::select('task_name')
                        ->where('objective_id',$objective->id)
                        ->get();

        $deadline = Deadline::select('date')
                        ->where('objective_id',$objective->id)
                        ->first();

        $kr = Keyresult::select('keyresult_name','progress')
                        ->where('objective_id',$objective->id)
                        ->get();

        $tt = Task::select('task_name','progress')
                        ->where('objective_id',$objective->id)
                        ->get();


        return view('/sistem/monitor/objective/objective_details', compact('team','objective','keyresult','task','tt','deadline','kr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Objective $objective, Deadline $deadline)
    {
        //
        return view('/sistem/monitor/objective/edit_objective', compact('objective', 'deadline','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Objective $objective, Deadline $deadline)
    {
        //
        $request->validate([
            'objective_name' => 'required',
        ]);
        
        Objective::where('id', $objective->id)
                -> update([
                        'objective_name' => $request->objective_name,
                        'objective_details' => $request->obejctive_details,
                ]);

        Deadline::where('id', $deadline->id)
                -> update([
                        'date' => $request->date,
                        'until' => $request->until,
                ]);
        
        /* return redirect('/sistem/monitor/index')->with('status', 'Objective Successfully Updated'); */
        /* return redirect()->action([MonitorController::class, 'index'])->with('status', 'Objective Successfully Updated'); */
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Objective Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, Objective $objective, Deadline $deadline)
    {
        //for deleting objective
        Objective::destroy($objective->id);
        Deadline::destroy($deadline->id);
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Objective Successfully Deleted');
    }
}
