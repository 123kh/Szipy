<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additem extends Model
{
    use HasFactory;
    protected $table="additems";
    protected $fillable=['Restro_Id','Main_Category_id','Item_Name','Item_Rate_Retail','Variant','Flavour','Item_Image','Description'];
}
