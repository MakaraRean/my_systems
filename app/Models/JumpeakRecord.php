<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumpeakRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'type',
        'qty',
        'full_price',
        'sell_price',
        'all_owe',
        'paid',
        'going_to_pay',
        'customer_id'
    ];
}
