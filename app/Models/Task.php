<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    protected $fillable = ['task_name','progress'];

    public function keyresult()
    {
        return $this->belongsTo(Keyresult::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class,'objective_task','task_id','objective_id');
    }

    public function deadline()
    {
        return $this->hasOne(Deadline::class);
    }


}
