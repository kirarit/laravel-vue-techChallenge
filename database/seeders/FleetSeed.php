<?php

namespace Database\Seeders;

use App\Models\Fleet;
use Illuminate\Database\Seeder;

class FleetSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fleets = [
            [
                'name' => 'Fleet1',
                'status' => 'Loading',
            ],
            [
                'name' => 'Fleet2',
                'status' => 'On Transit',
            ],
            [
                'name' => 'Fleet3',
                'status' => 'Available',
            ],
            [
                'name' => 'Fleet4',
                'status' => 'Available',
            ],
            [
                'name' => 'Fleet5',
                'status' => 'On Transit',
            ],
            [
                'name' => 'Fleet6',
                'status' => 'Available',
            ],

            [
                'name' => 'Fleet7',
                'status' => 'Loading',
            ],
            [
                'name' => 'Fleet8',
                'status' => 'Available',
            ],
        ];

        foreach ($fleets as $fleet) {
            Fleet::create($fleet);
        }
    }
}
