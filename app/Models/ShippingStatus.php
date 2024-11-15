<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class ShippingStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'con_ref_cnf_ord',
        'ref_con_cnf_ord'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
