<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MonitorContorller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Objective;
use App\Models\Keyresult;
use App\Models\Deadline;

class KeyresultController extends Controller
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
        return view('/sistem/monitor/keyresult/new_keyresult', compact('team','objective'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $team, Objective $objective)
    {
        
        $objective = Objective::where('id',$objective->id)->first();

        $request->validate([
            'keyresult_name' => 'required',
        ]);

        $keyresult = new Keyresult();
        $keyresult->keyresult_name = $request->keyresult_name;
        $keyresult->keyresult_details = $request->keyresult_details;
        $keyresult->objective_id = $objective->id;
        $keyresult->save();

        $deadline = new Deadline();
        $deadline->keyresult_id = $keyresult->id;
        $deadline->date = $request->date;
        $deadline->until = $request->until;
        $deadline->save();

         
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Keyresult Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Objective $objective, Keyresult $keyresult)
    {
        //
        $team = Team::where('id',$team->id)->first();

        $objective = Objective::where('id',$objective->id)->first();

        $keyresult = Keyresult::where('id',$keyresult->id)->first();

        $deadline = Deadline::select('date','until')
                        ->where('keyresult_id',$keyresult->id)
                        ->first();

        return view('/sistem/monitor/keyresult/keyresult_details', compact('team','objective','keyresult','deadline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, Objective $objective, Keyresult $keyresult, Deadline $deadline)
    {
        //
    return view('/sistem/monitor/keyresult/edit_keyresult', compact('keyresult', 'deadline', 'objective', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, Objective $objective, Keyresult $keyresult, Deadline $deadline)
    {
        //
        $request->validate([
            'keyresult_name' => 'required',
        ]);
        
        Keyresult::where('id', $keyresult->id)
                -> update([
                        'keyresult_name' => $request->keyresult_name,
                        'keyresult_details' => $request->keyresult_details,
                        'progress' => $request->progress
                ]);
        
        Deadline::where('id', $deadline->id)
                -> update([
                        'date' => $request->date,
                        'until' => $request->until,
                ]);
        
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Objective Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team, $objective, Keyresult $keyresult, Deadline $deadline)
    {
        //
        Keyresult::destroy($keyresult->id);
        Deadline::destroy($deadline->id);
        return redirect()->route('sistem.monitor.index', ['team' => $team])->with('status', 'Keyresult Successfully Deleted');
    }
}
