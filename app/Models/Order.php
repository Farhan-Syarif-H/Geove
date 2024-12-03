<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi ke User, banyak Order dimiliki oleh satu User
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
