<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransport extends Model
{
    use HasFactory;
    protected $fillable = ['orderNo', 'name', 'vehicleNo', 'vehicleOwner', 'vehicleDriver', 'driverMob', 'additionalCharges'];

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class,'orderNo', 'orderNo');
    }
}
