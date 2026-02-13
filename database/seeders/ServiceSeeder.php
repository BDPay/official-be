<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'title' => ['en' => 'Personal Transfer (Accept Payment)', 'id' => 'Transfer Personal (Terima Pembayaran)'],
            'description' => ['en' => 'Transfer funds for personal needs', 'id' => 'Transfer dana untuk kebutuhan personal'],
            'items' => [
                ['label' => 'Transfer by Agent', 'description' => 'Transfer uang melalui Agent BDPay'],
                ['label' => 'In-House Transfer', 'description' => 'Transfer uang melalui Agent in-house BDPay'],
                ['label' => 'Direct Transfer', 'description' => 'Transfer uang langsung ke rekening tujuan'],
            ],
            'sort_order' => 0,
        ]);

        Service::create([
            'title' => ['en' => 'Corporate Transfer (Payment)', 'id' => 'Transfer Korporat (Pembayaran)'],
            'description' => ['en' => 'Transfer funds for corporate needs', 'id' => 'Transfer dana untuk kebutuhan korporat'],
            'items' => [
                ['label' => 'Transfer by Agent', 'description' => 'Transfer uang melalui Agent BDPay'],
                ['label' => 'In-House Transfer', 'description' => 'Transfer uang melalui Agent in-house BDPay'],
                ['label' => 'Transfer via API', 'description' => 'Transfer uang melalui API'],
            ],
            'sort_order' => 1,
        ]);

        Service::create([
            'title' => ['en' => 'Disbursement/Payroll (Multiple Recipients)', 'id' => 'Disbursement/Payroll (Beberapa Penerima)'],
            'description' => ['en' => 'Send funds to multiple recipients at once', 'id' => 'Kirim dana ke beberapa penerima sekaligus'],
            'items' => [],
            'sort_order' => 2,
        ]);
    }
}
