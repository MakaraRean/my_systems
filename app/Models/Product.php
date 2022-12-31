<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'qty',
        'purchase_price',
        'sell_price',
        'desc',
        'category_id',
        'unit',
        'blister_per_base',
        'tablet_per_blister',
        'qty_type',
    ];
}
