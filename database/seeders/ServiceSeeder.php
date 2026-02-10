<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'title' => ['en' => 'Personal Transfer (Accept Payment)'],
            'description' => ['en' => 'Transfer funds for personal needs'],
            'items' => [
                ['label' => 'Transfer by Agent', 'description' => 'Transfer uang melalui Agent BDPay'],
                ['label' => 'In-House Transfer', 'description' => 'Transfer uang melalui Agent in-house BDPay'],
                ['label' => 'Direct Transfer', 'description' => 'Transfer uang langsung ke rekening tujuan'],
            ],
            'sort_order' => 0,
        ]);

        Service::create([
            'title' => ['en' => 'Corporate Transfer (Payment)'],
            'description' => ['en' => 'Transfer funds for corporate needs'],
            'items' => [
                ['label' => 'Transfer by Agent', 'description' => 'Transfer uang melalui Agent BDPay'],
                ['label' => 'In-House Transfer', 'description' => 'Transfer uang melalui Agent in-house BDPay'],
                ['label' => 'Transfer via API', 'description' => 'Transfer uang melalui API'],
            ],
            'sort_order' => 1,
        ]);

        Service::create([
            'title' => ['en' => 'Disbursement/Payroll (Multiple Recipients)'],
            'description' => ['en' => 'Send funds to multiple recipients at once'],
            'items' => [],
            'sort_order' => 2,
        ]);
    }
}
