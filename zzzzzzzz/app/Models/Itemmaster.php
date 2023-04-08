<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemmaster extends Model
{
    use HasFactory;
    protected $table="itemmaster";
    protected $fillable=['Main_Category_id','Item_Name','Other_Food'];
}
