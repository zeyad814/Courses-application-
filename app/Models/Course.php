<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'major_id',
        "sub_major_id",
        "sub_sub_major_id",
        "status",
        "price",
        "discount",
        "description"
    ];
}
