<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Team;
use App\Models\User;
use App\Models\objective;
use App\Models\Product;

class TeamService extends ServiceProvider
{

    public function indexData()
    {
        $data = array (
            'team' => Team::all(),
            'product' => Product::all(),
        );
        return $data;
    }
    /**
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
