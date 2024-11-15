<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'truck_number',
        'item',
        'weight',
        'description',
        'tracking_info',
        'payment_status',
        'order_status',
        'delivery_status',
        'notified',
        'notes'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
