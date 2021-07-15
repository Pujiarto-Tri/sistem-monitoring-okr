<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $fillable = ['name','path'];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
