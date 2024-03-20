<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    use HasFactory;
    protected $fillable = ['orderNo', 'emptyVehicleWt', 'grossLoadedVehicleWt', 'netVehicleWt', 'destination1loadedWt', 'destination1emptyWt', 'destination2loadedWt', 'destination2emptyWt', 'grNo', 'grDate', 'ewayBill', 'InvoiceNo', 'Supplier', 'additionalCharges'];
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class, 'orderNo', 'orderNo');
    }
    public function orderTransport()
    {
        return $this->belongsTo(OrderTransport::class, 'orderNo', 'orderNo');
    }
}
