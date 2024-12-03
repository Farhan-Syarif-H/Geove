<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'foto',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function carts()
    {
        return $this->hasMany(Order::class);
    }
}
