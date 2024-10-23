<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    use HasFactory;

    protected $table = 'newsgame';

    protected $fillable = [
        'photoUrl',
        'title',
        'description',
        'name',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'item_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'item_id');
    }
}
