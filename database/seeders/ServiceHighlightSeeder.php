<?php

namespace Database\Seeders;

use App\Models\ServiceHighlight;
use Illuminate\Database\Seeder;

class ServiceHighlightSeeder extends Seeder
{
    public function run(): void
    {
        $highlights = [
            [
                'title' => ['en' => '24/7 service'],
                'content' => ['en' => 'Our CS team is ready to serve and help you 24/7.'],
                'sort_order' => 0,
            ],
            [
                'title' => ['en' => 'Speed in integration'],
                'content' => ['en' => 'Integrate your payment system and enjoy sending money to 136 banks at once in just one day of integration.'],
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => '99% Success Rate'],
                'content' => ['en' => 'Your business transactions are guaranteed reliably on BDPay. 99% of your transactions will be successful.'],
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'No Hidden Fees'],
                'content' => ['en' => 'There are no registration, integration, monthly or yearly fees.'],
                'sort_order' => 3,
            ],
        ];

        foreach ($highlights as $highlight) {
            ServiceHighlight::create(array_merge($highlight, ['is_active' => true]));
        }
    }
}
