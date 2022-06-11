<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Mark Doe',
                'email' => 'mark@test.com',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@test.com',
            ],
            [
                'name' => 'Eric Doe',
                'email' => 'eric@test.com',
            ],
            [
                'name' => 'David Doe',
                'email' => 'david@test.com',
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@test.com',
            ],
            [
                'name' => 'Joy Doe',
                'email' => 'joy@test.com',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
