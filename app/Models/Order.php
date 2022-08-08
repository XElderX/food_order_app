<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'name', 'surname', 'status', 'total_price'];




    protected $with = ['user'];
 
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function orderedItem(){
        return $this->hasMany(OrderedItem::class);
    }

}
