<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restrovendor extends Model
{
    use HasFactory;
    protected $table="restrovendor";
    protected $fillable=['Restro_Name','Address','Contact_No','City_Id','Password','Latitude','Longitude'];
   
    
}
