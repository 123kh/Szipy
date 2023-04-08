<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table="cards";
    protected $fillable=[
    'user_id', 
    'restro_id',
    'item_id',
    'item_piece',
    'item_kg',
    'order_id',
    'status',
    'total',
    'weight_type',
    'weight',
    'item_name'
];
}
