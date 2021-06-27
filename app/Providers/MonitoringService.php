<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Keyresult;
use App\Models\Objective;
use App\Models\Team;

class MonitoringService extends ServiceProvider
{
    
    public function indexData(){
        $data = array (
            'team' => Team::all(),
            'objective' => Objective::all(),
            'keyresult' => Keyresult::all(),
        );
        return $data;

    }
    
    /**
     * 
     * 
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
