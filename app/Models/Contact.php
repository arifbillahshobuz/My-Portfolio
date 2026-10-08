<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'service_id',
        'email',
        'phone',
        'description',
        'status',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
