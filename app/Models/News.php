<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'headline',
        'location',
        'author_id',
        'description',
        'published_at',
        'image',
        'audio',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
