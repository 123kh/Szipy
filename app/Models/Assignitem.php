<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignitem extends Model
{
    use HasFactory;
    protected $table="assignitem";
    protected $fillable=['Restro_Id','Main_Category_id','item_name_id'];


    // public function getItemNameAttribute()
    // {
        
    //     $item_id=Assignitem::where('Restro_Id',$this->Restro_Id)->pluck('item_name_id')->toArray(); 
    //     $item_name=Additem::whereIn('id',$item_id)->pluck('Item_Name')->toArray(); 
    //     return implode(', ',$item_name);
    // }
    
    public function getItemNameAttribute()
    {
        $item_id=explode(',',$this->item_name_id);
        $item_name=Additem::whereIn('id',$item_id)->pluck('Item_Name')->toArray(); 
        return implode(', ',$item_name);
    }

    public function items()
    {
        return $this->hasMany(Additem::class,'id','item_name_id');
    }
}
