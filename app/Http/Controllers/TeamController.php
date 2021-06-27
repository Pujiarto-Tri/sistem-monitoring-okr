<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Models\Team;
use App\Models\User;
use App\Models\Objective;

use App\Providers\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TeamController extends Controller
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
        $user = auth()->user();

        $team = Team::where('user_id',$user->id)
                ->get();

        return view('/sistem/home/index', compact('team')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        {
            return view('/sistem/home/add_team');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        /* $user = auth()->user();
        $data = $request->all();
        $data['user_id']=$user->id; */

        $request->validate([
            'team_name' => 'required',
        ]);
          
        Team::create([
            'team_name' => $request->team_name,
            'user_id' => auth()->user()->id,
        ]);      

        return redirect('/sistem/home/index')->with('status', 'New Team Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team, Objective $objective)
    {
        //
        $team = Team::where('id',$team->id)->first();

        $objective = Objective::select('objective_name')
                        ->where('team_id',$team->id)
                        ->get();

        return view('/sistem/home/details', compact('team','objective'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        return view('/sistem/home/edit_team', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //

        $request->validate([
            'team_name' => 'required',
        ]);
        
        Team::where('id', $team->id )
                -> update([
                        'team_name' => $request->team_name,
                ]);
        return redirect('/sistem/home/index')->with('status', 'Team Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        Team::destroy($team->id);
        return redirect('/sistem/home/index')->with('status', 'Team Successfully Deleted');
    }

}
