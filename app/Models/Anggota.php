<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [ 'name', 'email', 'password',];

    protected $hidden = [ 'password', 'remember_token',];
}
