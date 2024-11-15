<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Shipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'status',
        'availability',
        'address',
        'city',
        'state',
        'country',
        'zip'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
