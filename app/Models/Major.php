<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'parent_id'
    ];

    public function children_level1()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function children_level2()
    {
        return $this->hasMany(self::class, 'children_level1');
    }

    public function scopeWithChildren($query)
    {
        return $query->whereNull('parent_id');
    }
}
