<?php

namespace Database\Seeders;

use App\Models\CustomerOrder;
use Illuminate\Database\Seeder;

class CustomerOrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerOrders = [
            [
                'customer_id' => 1,
                'order_id' => 2,
                'fleet_id' => 1,
                'status' => 'Pending',
            ],
            [
                'customer_id' => 2,
                'order_id' => 1,
                'fleet_id' => 2,
                'status' => 'Loading',
            ],
            [
                'customer_id' => 3,
                'order_id' => 6,
                'fleet_id' => 7,
                'status' => 'Pending',
            ],
            [
                'customer_id' => 4,
                'order_id' => 5,
                'fleet_id' => 8,
                'status' => 'Loading',
            ],
            [
                'customer_id' => 5,
                'order_id' => 4,
                'fleet_id' => 5,
                'status' => 'Delivered',
            ],
            [
                'customer_id' => 6,
                'order_id' => 3,
                'fleet_id' => 4,
                'status' => 'Dispatched',
            ]
        ];

        foreach ($customerOrders as $orders) {
            CustomerOrder::create($orders);
        }
    }
}
