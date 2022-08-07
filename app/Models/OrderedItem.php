<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    use HasFactory;
    public $fillable = ['order_id', 'dish_id', "quantity"];
   //  protected $with = ['order'];
 
    public function order(){
        return $this->belongsTo(Order::class);
     }
     public function dish(){
        return $this->belongsTo(Dish::class);
     }


     
}
