<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    public function category() {
        return $this
            ->belongsTo(Category::class)
            ->first();
    }

    protected $fillable = [
        'title',
        'description'
    ];
}
