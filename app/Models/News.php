<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}
protected $fillable = [
    'user_id',
    'title',
    'image_path',
    'content',
    'published_at',
];

protected $casts = [
    'published_at' => 'datetime',
];
}
