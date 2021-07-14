<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Objective;
use App\Models\Task;
use App\Models\Deadline;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Team $team, Objective $objective)
    {
        //
        return view('/sistem/monitor/task/new_task', compact('team','objective'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $team, Objective $objective)
    {
        //
        $objective = Objective::where('id',$objective->id)->first();

        $request->validate([
            'task_name' => 'required',
            
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->objective_id = $objective->id;
        $task->save();

        $deadline = new Deadline();
        $deadline->task_id = $task->id;
        $deadline->date = $request->date;
        $deadline->until = $request->until;
        $deadline->save();

        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Initiative Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Objective $objective,Task $task)
    {
        //
        $team = Team::where('id',$team->id)->first();

        $objective = Objective::where('id',$objective->id)->first();

        $task = task::where('id',$task->id)->first();

        $deadline = Deadline::select('date','until')
                        ->where('task_id',$task->id)
                        ->first();

        return view('/sistem/monitor/task/task_details', compact('team','objective','task','deadline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Objective $objective, Task $task, Deadline $deadline)
    {
        //
        return view('/sistem/monitor/task/edit_task', compact('team', 'objective', 'task', 'deadline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Objective $objective, Task $task, Deadline $deadline)
    {
        //
        $request->validate([
            'task_name' => 'required',
        ]);
        
        Task::where('id', $task->id)
                -> update([
                        'task_name' => $request->task_name,
                        'progress' => $request->progress
                ]);
        
        Deadline::where('id', $deadline->id)
                -> update([
                        'date' => $request->date,
                        'until' => $request->until,
                ]);
        
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Initiative Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team, $objective, Task $task, Deadline $deadline)
    {
        //
        Task::destroy($task->id);
        Deadline::destroy($deadline->id);
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Initiative Successfully Deleted');
    }
}
