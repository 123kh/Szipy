<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordereditem extends Model
{
    use HasFactory;
    protected $table="ordereditem";
    protected $fillable=['order_id','item_id','Restro_Id','Main_Category_id','Item_Name','Item_Rate_Retail','Variant','Flavour','Item_Image','Description'];
}
