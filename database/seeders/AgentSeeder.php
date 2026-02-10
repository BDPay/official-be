<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        Agent::create([
            'name' => 'BDPay In-House Agent',
            'type' => 'in_house',
            'phone' => '+62 8113240999',
            'email' => 'cs@bdpay.co.id',
            'address' => ['en' => 'Gedung Royal Square Lt. 3A Jl. Raya Menganti No.479, Babatan, Kec. Wiyung, Surabaya, Jawa Timur 60227'],
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
            'maps_url' => 'https://goo.gl/maps/PSLVrhqczCMKxYpE6',
            'is_active' => true,
            'sort_order' => 0,
        ]);
    }
}
