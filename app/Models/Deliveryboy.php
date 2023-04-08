<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryboy extends Model
{
    use HasFactory;
    protected $table="deliveryboy";
    protected $fillable=['user_id','Account_No','Branch'];
    
   
}
