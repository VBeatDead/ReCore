<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'rating',
        'review',
        'category',
        'tags',
        'status',
        'badge',
        'point_reward'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rating) {
            $rating->calculateStatusAndRewards();
        });
    }

    public function calculateStatusAndRewards()
    {
        if ($this->rating >= 4.5) {
            $this->status = "Sangat Direkomendasikan";
            $this->badge = "gold";
            $this->point_reward = 100;
        } elseif ($this->rating >= 4.0) {
            $this->status = "Direkomendasikan";
            $this->badge = "silver";
            $this->point_reward = 50;
        } elseif ($this->rating >= 3.0) {
            $this->status = "Cukup Baik";
            $this->badge = "bronze";
            $this->point_reward = 25;
        } else {
            $this->status = "Perlu Perbaikan";
            $this->badge = "none";
            $this->point_reward = 10;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function newsgame()
    {
        return $this->belongsTo(Personal::class, 'item_id');
    }
}
