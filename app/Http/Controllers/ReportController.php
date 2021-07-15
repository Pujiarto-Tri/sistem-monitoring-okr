<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Controllers\MonitorContorller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;
use App\Models\Objective;
use App\Models\Report;
use App\Models\Team;
use App\Providers\MonitoringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this -> middleware('auth',['except' => 'index']);
    }

    public function index(Team $team, Objective $objective, Report $report)
    {
        $objective = Objective::where('id',$objective->id)->first();

        $report = Report::with('objective')
                        ->where('objective_id',$objective->id)
                        ->get();

        return view('/sistem/monitor/objective/report', compact('team','objective', 'report'));
    }

    public function create(Team $team, Objective $objective)
    {
        return view('/sistem/monitor/objective/upload_report', compact('team','objective'));
    }

    public function store(Request $request, $team, Objective $objective)
    {
        
        $objective = Objective::where('id',$objective->id)->first();
        $save = new Report();

        $this->validate($request, [
            'report' => 'required|file|max:7000'
        ]);

        /* $path = Storage::putFile(
            'public/report',
            $request->file('report'),
        ); */
        $name = $request->file('report')->getClientOriginalName();
        $path = $request->file('report')->store('public/report');

        $save->name = $name;
        $save->path = $path;
        $save->objective_id = $objective->id;
        $save->save();
        
        

        return redirect()->route('sistem.report.index', ['team' => $team, 'objective' => $objective])->with('status', 'Objective Successfully Added');
    }
    
    function getReport($filename, $objective, $team)
    {
        $report = Storage::disk('public/report')->get($filename);

        return (new Response($report, 200))
            ->header('Content-Type', 'file');
    }
}
