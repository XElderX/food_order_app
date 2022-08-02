<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = ['dish_name', 'description', 'price', 'foto_url'];


    protected $with = ['dish'];

    public function dish(){
        return $this->belongsTo(Dish::class);
    }

}
