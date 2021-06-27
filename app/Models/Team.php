<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $fillable = ['team_name','user_id'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function objective()
    {
        return $this->hasMany(Objective::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    




}
