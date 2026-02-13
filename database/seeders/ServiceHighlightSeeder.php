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
                'title' => ['en' => '24/7 service', 'id' => 'Layanan 24/7'],
                'content' => ['en' => 'Our CS team is ready to serve and help you 24/7.', 'id' => 'Tim CS kami siap melayani dan membantu Anda 24/7.'],
                'sort_order' => 0,
            ],
            [
                'title' => ['en' => 'Speed in integration', 'id' => 'Kecepatan integrasi'],
                'content' => ['en' => 'Integrate your payment system and enjoy sending money to 136 banks at once in just one day of integration.', 'id' => 'Integrasikan sistem pembayaran Anda dan nikmati pengiriman uang ke 136 bank sekaligus hanya dalam satu hari integrasi.'],
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => '99% Success Rate', 'id' => 'Tingkat Keberhasilan 99%'],
                'content' => ['en' => 'Your business transactions are guaranteed reliably on BDPay. 99% of your transactions will be successful.', 'id' => 'Transaksi bisnis Anda dijamin handal di BDPay. 99% transaksi Anda akan berhasil.'],
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'No Hidden Fees', 'id' => 'Tanpa Biaya Tersembunyi'],
                'content' => ['en' => 'There are no registration, integration, monthly or yearly fees.', 'id' => 'Tidak ada biaya pendaftaran, integrasi, bulanan, atau tahunan.'],
                'sort_order' => 3,
            ],
        ];

        foreach ($highlights as $highlight) {
            ServiceHighlight::create(array_merge($highlight, ['is_active' => true]));
        }
    }
}
