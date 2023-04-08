<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additem extends Model
{
    use HasFactory;
    protected $table="additems";
    protected $fillable=['Main_Catagory_id','Item_Name_id','Item_Rate_Retail','Item_Rate_Hotel','Variant','Flavour','Item_Image','Description'];
}
