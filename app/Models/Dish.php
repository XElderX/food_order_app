<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public $fillable = [''];

    public function order(){
        return $this->hasMany(Order::class);
    }
    protected $with = ['menu'];
 
    public function menu(){
       return $this->belongsTo(Menu::class);
    }

}
