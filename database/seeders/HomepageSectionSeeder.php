<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run(): void
    {
        HomepageSection::create([
            'section_key' => 'hero',
            'title' => ['en' => 'Smart, Steady, And Secure Business Solutions', 'id' => 'Solusi Bisnis yang Cerdas, Handal, dan Aman'],
            'description' => ['en' => "To become a reliable and innovative financial institution and play an active role in supporting the community's economy in accordance with government policies.", 'id' => 'Menjadi lembaga keuangan yang handal dan inovatif serta berperan aktif dalam mendukung perekonomian masyarakat sesuai dengan kebijakan pemerintah.'],
            'content' => [
                'badges' => [
                    ['name' => 'ISO', 'image' => '/img/logo-iso.png'],
                    ['name' => 'Bank Licensed', 'image' => '/img/logo-bl2.png'],
                    ['name' => 'ASPI', 'image' => '/img/logo-aspi.png'],
                    ['name' => 'APPUI', 'image' => '/img/logo-appui2.png'],
                    ['name' => 'PSE', 'image' => '/img/logo-pse.png'],
                ],
                'cta_text' => 'Our Agents',
                'cta_link' => '/agent',
                'hero_image' => '/img/apps-002.png',
                'background_image' => '/img/background-01.png',
            ],
            'sort_order' => 0,
        ]);

        HomepageSection::create([
            'section_key' => 'projections',
            'title' => ['en' => 'BDPay Business Projections', 'id' => 'Proyeksi Bisnis BDPay'],
            'content' => [
                'counters' => [
                    ['value' => 300, 'suffix' => 'K+', 'title' => 'Projecting business', 'subtitle' => 'using BDPay all over 2021'],
                    ['value' => 10, 'suffix' => 'M+', 'title' => 'Projecting transactions', 'subtitle' => 'completed per month'],
                ],
                'background_image' => '/img/box-4.png',
            ],
            'sort_order' => 1,
        ]);
    }
}
