<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
       'stock',
       'description',
       'about'


    ];
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
