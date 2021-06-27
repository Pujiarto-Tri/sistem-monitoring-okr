<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, Objective $objective)
    {
        //
        $objective = Objective::where('id',$objective->id)->first();

        $request->validate([
            'task_name' => 'required',
            
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'task_details' => $request->task_details,
            'progress' => $request->progress
        ]);

        Deadline::create([
            'date' => $request->date,
            'until' => $request->until,
        ]);

        return redirect('/sistem/monitor/objective/details/{team}/{objective}')->with('status', 'New Task Successfully Added');
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
                        'task_details' => $request->task_details,
                        'progress' => $request->progress
                ]);
        
        Deadline::where('id', $deadline->id)
                -> update([
                        'date' => $request->date,
                        'unitl' => $request->until,
                ]);
        
        return redirect('/sistem/monitor/task/details/{{task->id}}')->with('status', 'task Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, Deadline $deadline, $id)
    {
        //
        Task::destroy($task->id);
        Deadline::destroy($deadline->id);
        return redirect('/sistem/monitor/index')->with('status', 'task Successfully Deleted');
    }
}
