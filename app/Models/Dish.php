<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public $fillable = ['menu_id', 'dish_name', 'description', 'price', 'foto_url'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    protected $with = ['menu'];
 
    public function menu(){
       return $this->belongsTo(Menu::class);
    }

}
