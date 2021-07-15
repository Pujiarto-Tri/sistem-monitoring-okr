<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $table = 'objective';
    protected $fillable = ['objective_name','objective_details','progress','team_id'];

    public function keyresult()
    {
        return $this->hasMany(Keyresult::class);
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class,'objective_team','objective_id','team_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function deadline()
    {
        return $this->hasOne(Deadline::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class,'objective_id');
    }

}
