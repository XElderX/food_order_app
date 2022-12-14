<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $fillable = ['menu_title', 'restourant_id'];

    public function dishes(){
        return $this->hasMany(Dish::class);
    }
    protected $with = ['restourant'];
 
    public function restourant(){
       return $this->belongsTo(Restourant::class);
    }
}
