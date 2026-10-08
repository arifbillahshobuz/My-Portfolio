<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'category',
        'percentage',
        'level',
        'status',
        'sort_order',
        'description',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'sort_order' => 'integer',
    ];
}
