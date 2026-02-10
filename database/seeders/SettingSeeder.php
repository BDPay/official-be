<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['group' => 'contact', 'key' => 'address', 'value' => 'Gedung Royal Square Lt. 3A Jl. Raya Menganti No.479, Babatan, Kec. Wiyung, Surabaya, Jawa Timur 60227'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '+62 8113240999'],
            ['group' => 'contact', 'key' => 'email', 'value' => 'cs@bdpay.co.id'],
            ['group' => 'contact', 'key' => 'whatsapp', 'value' => '628113240999'],
            ['group' => 'contact', 'key' => 'office_hours', 'value' => 'Monday - Friday 09.00-15.00'],
            ['group' => 'social', 'key' => 'facebook', 'value' => 'https://www.facebook.com/bdpay.co.id'],
            ['group' => 'social', 'key' => 'instagram', 'value' => 'https://www.instagram.com/bdpay_id/'],
            ['group' => 'social', 'key' => 'twitter', 'value' => 'https://twitter.com/BDPAY_ID'],
            ['group' => 'social', 'key' => 'whatsapp_url', 'value' => 'https://wa.me/628113240999/'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
