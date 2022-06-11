<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_id',
        'fleet_id',
        'status',
    ];

    public function customer()
    {
        return  $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return  $this->belongsTo(Order::class);
    }

    public function fleet()
    {
        return  $this->belongsTo(Fleet::class);
    }

    public static function storeValidationRules(Request $request)
    {
        return [
            'customer_id' => ['required'],
            'order_id' => ['required'],
            'fleet_id' => ['required'],
            'status' => ['required'],
        ];
    }
}
