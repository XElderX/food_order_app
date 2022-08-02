<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restourant extends Model
{
    use HasFactory;
    
    public $fillable = ['title', 'code', 'address'];

public function menus(){
    return $this->hasMany(Menu::class);
}
}
