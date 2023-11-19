<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    protected $fillable = [
        'user_id',
        'gender',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
