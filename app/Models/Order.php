<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=['order_id','restro_id','total','discount','payment_mode','address','delivery_type','contact','coupon_code','assign_delivery','user_id','approval','order_date','status','lat','long'];
}
