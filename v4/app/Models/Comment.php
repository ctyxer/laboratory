<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'post_id',
        'text'
    ];

    public function post()
    {
        return $this->hasOne(Post::class)->first();
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }
}