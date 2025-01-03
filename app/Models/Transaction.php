<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'boarding_house_id',
        'room_id',
        'name',
        'email',
        'phone',
        'payment_method',
        'payment_status',
        'start_date',
        'duration',
        'total_amount',
        'transaction_date',
        'snap_token',
    ];


    // 1 room hanya dimiliki 1 kos kosan
    public function boardingHouse(){
        return $this->belongsTo(boardingHouse::class);
    }

        //1 gambar hanya di miniki 1 ruangan
    public function room(){
        return $this->belongsTo(Room::class);
    }

}
