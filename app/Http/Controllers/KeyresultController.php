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
    public function store(Request $request, Objective $objective/* , Team $team */)
    {
        //
        /* $team = Team::where('id',$team->id)->first(); */

        $objective = Objective::where('id',$objective->id)->first();

        $request->validate([
            'keyresult_name' => 'required',
        ]);

         keyresult::create([
            'keyresult_name' => $request->keyresult_name,
            'keyresult_details' => $request->keyresult_details,
            'progress' => $request->progress
        ]);

        Deadline::create([
            'date' => $request->date,
            'until' => $request->until,
        ]);
        return redirect()->action([MonitorController::class, 'index',['team'=>$team]])->with('status', 'Objective Successfully Added');
        /* return redirect('/sistem/monitor/objective/details/{team}/{objective}')->with('status', 'keyresult and new Keyresult Successfully Added'); */
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
    public function update(Request $request, Team $team, Objective $objective, Keyresult $keyresult, Deadline $deadline, $id)
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
                        'unitl' => $request->until,
                ]);
        
        return redirect('/sistem/monitor/keyresult/details/{{keyresult->id}}')->with('status', 'Keyresult Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyresult $keyresult, Deadline $deadline, $id)
    {
        //
        Keyresult::destroy($keyresult->id);
        Deadline::destroy($deadline->id);
        return redirect('/sistem/monitor/index')->with('status', 'Keyresult Successfully Deleted');
    }
}
