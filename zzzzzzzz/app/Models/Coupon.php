<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table="coupons";
    protected $fillable=['Select_Vendor','Coupon_Name','Coupon_Code','Discount_Type','Value','Minimum_Order_Amount'];

    // public function Restrovendor()
    // {
    //  return $this->hasOne(Restrovendor::class,'id','Restro_Name');
    // }
 
    
    
    
}
