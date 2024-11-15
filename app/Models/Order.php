<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\Conductor;
use App\Models\Client;
use App\Models\Freight;
use App\Models\Refiner;
use App\Models\Shipper;
use App\Models\NotifyStatus;
use App\Models\ShippingStatus;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'status',
        'order_total',
        'conductor_id',
        'refiner_id',
        'freight_id',
        'shipper_id',
        'client_id',
    ];

    public function orderDetail(){
        return $this->hasOne(OrderDetail::class);
    }

    public function conductor(){
        return $this->belongsTo(Conductor::class);
    }

    public function refiner(){
        return $this->belongsTo(Refiner::class);
    }

    public function freight(){
        return $this->belongsTo(Freight::class);
    }

    public function shipper(){
        return $this->belongsTo(Shipper::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function notifyStatus(){
        return $this->hasOne(NotifyStatus::class);
    }

    public function shippingStatus(){
        return $this->hasOne(ShippingStatus::class);
    }
}
