<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignitem extends Model
{
    use HasFactory;
    protected $table="assignitem";
    protected $fillable=['Restro_Id','Item_Name'];
}
