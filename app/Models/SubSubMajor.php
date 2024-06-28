<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMajor extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'submajor_id',
    ];
}
