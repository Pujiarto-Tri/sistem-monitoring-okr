<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;

    protected $table = 'deadline';
    protected $fillable = ['date','until','objective_id'];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function keyresult()
    {
        return $this->belongsTo(Keyresult::class);
    }
}
