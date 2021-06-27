<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyresult extends Model
{   
    use HasFactory;

    protected $table = 'keyresult';
    protected $fillable = ['keyresult_name','progress'];


    public function objective()
    {
        return $this->belongsTo(Objective::class,'objective_keyresult','keyresult_id','objective_id');
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function deadline()
    {
        return $this->hasOne(Deadline::class);
    }
}
