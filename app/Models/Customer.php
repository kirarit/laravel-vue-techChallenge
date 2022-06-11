<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email'
    ];

    public static function storeValidationRules(Request $request)
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email']
        ];
    }
}
