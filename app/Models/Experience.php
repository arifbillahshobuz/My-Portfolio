<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'designation',
        'owner',
        'start_job',
        'end_job',
        'location',
        'image',
        'message',
    ];

    protected $casts = [
        'start_job' => 'date',
        'end_job' => 'date',
    ];
}
