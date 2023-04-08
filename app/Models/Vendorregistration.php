<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendorregistration extends Model
{
    use HasFactory;
    protected $table="vendorregistration";
    protected $fillable=['User_Name','Em_Id','Password','Contact_No','Latitude','Longitude'];
}
