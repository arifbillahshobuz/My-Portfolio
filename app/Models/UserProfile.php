<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'cover_image',
        'description',
        'cv',
        'organization',
        'address',
        'city',
        'district',
        'state',
        'country',
        'zip',
        'language',
        'facebook',
        'instagram',
        'linkedin',
        'github',
        'twitter',
        'key',
        'value',
        'designation',
        'user_id'
    ];
    function user(){
        return $this->hasOne(UserProfile::class);
    }
}
