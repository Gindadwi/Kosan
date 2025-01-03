<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'boarding_house_id',
        'photo',
        'name',
        'content',
        'rating',
    ];

        // 1 room hanya dimiliki 1 kos kosan
    public function boardingHouse(){
        return $this->belongsTo(boardingHouse::class);
    }
}
