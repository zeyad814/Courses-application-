<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instructor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
    'name',
    'email',
    'bio',
    'phone',
    'password',
    'role',
    'salary',
    'major_id',
    'sub_major_id',
    "sub_sub_majors",
    ];
}
