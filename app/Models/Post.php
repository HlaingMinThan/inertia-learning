<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function scopeFilter($query, $search)
    {
        $query->when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        });
    }
}
