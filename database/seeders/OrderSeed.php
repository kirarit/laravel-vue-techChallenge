<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'name' => 'Desk',
            ],
            [
                'name' => 'Chair',
            ],
            [
                'name' => 'Bed',
            ],
            [
                'name' => 'Lenovo Laptop',
            ],
            [
                'name' => 'Woofer',
            ],
            [
                'name' => 'Desktop',
            ],
            [
                'name' => 'HP Laptop',
            ],
            [
                'name' => 'Table',
            ],
            [
                'name' => 'Phone',
            ],
            [
                'name' => 'Headphones',
            ],
        ];
        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
