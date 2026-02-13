<?php

namespace Database\Seeders;

use App\Models\FeatureCategory;
use App\Models\FeatureItem;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $secure = FeatureCategory::create([
            'name' => ['en' => 'Secure', 'id' => 'Aman'],
            'slug' => 'secure',
            'sort_order' => 0,
        ]);

        $secureItems = [
            ['en' => 'Certified by ISO/IEC 27001:2013', 'id' => 'Tersertifikasi ISO/IEC 27001:2013'],
            ['en' => 'Disaster Recovery Center Ready', 'id' => 'Disaster Recovery Center Siap'],
            ['en' => 'Fraud Detection System Ready', 'id' => 'Sistem Deteksi Fraud Siap'],
            ['en' => 'Using Encryptions for Security', 'id' => 'Menggunakan Enkripsi untuk Keamanan'],
            ['en' => 'Using Audit Trail System', 'id' => 'Menggunakan Sistem Audit Trail'],
            ['en' => 'Trusted Agent', 'id' => 'Agen Terpercaya'],
            ['en' => '24/7 Customer Service', 'id' => 'Layanan Pelanggan 24/7'],
            ['en' => 'Secured by blacklist KYC', 'id' => 'Dilindungi oleh blacklist KYC'],
            ['en' => 'Agent commitment on Non Disclosure Agreement', 'id' => 'Komitmen Agen pada Perjanjian Kerahasiaan'],
            ['en' => 'Direct Connect with Bank API', 'id' => 'Koneksi Langsung dengan API Bank'],
        ];

        foreach ($secureItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $secure->id,
                'title' => $title,
                'sort_order' => $i,
            ]);
        }

        $smart = FeatureCategory::create([
            'name' => ['en' => 'Smart', 'id' => 'Cerdas'],
            'slug' => 'smart',
            'sort_order' => 1,
        ]);

        $smartItems = [
            ['en' => 'User-friendly UI on BDPay Dashboard CMS', 'id' => 'Tampilan antarmuka yang ramah pengguna di Dashboard CMS BDPay'],
            ['en' => 'Easy transfer to 136 Banks in Indonesia', 'id' => 'Transfer mudah ke 136 Bank di Indonesia'],
            ['en' => 'Historically Reports', 'id' => 'Laporan Historis'],
            ['en' => 'Digital Receipt via SMS, Whatsapp, Email', 'id' => 'Bukti Digital melalui SMS, Whatsapp, Email'],
            ['en' => 'Easy cancellations process', 'id' => 'Proses pembatalan yang mudah'],
            ['en' => 'Roadmap development that supports community needs', 'id' => 'Pengembangan roadmap yang mendukung kebutuhan komunitas'],
        ];

        foreach ($smartItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $smart->id,
                'title' => $title,
                'sort_order' => $i,
            ]);
        }

        $steady = FeatureCategory::create([
            'name' => ['en' => 'Steady', 'id' => 'Handal'],
            'slug' => 'steady',
            'sort_order' => 2,
        ]);

        $steadyItems = [
            ['en' => 'Same day transfer', 'id' => 'Transfer di hari yang sama'],
            ['en' => 'Clean process and procedure', 'id' => 'Proses dan prosedur yang bersih'],
            ['en' => 'Professional in-house Agent', 'id' => 'Agen in-house yang profesional'],
            ['en' => 'Distributed Agent all over Indonesia', 'id' => 'Agen tersebar di seluruh Indonesia'],
            ['en' => 'SLA Problem handling Days+1', 'id' => 'SLA Penanganan masalah Hari+1'],
        ];

        foreach ($steadyItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $steady->id,
                'title' => $title,
                'sort_order' => $i,
            ]);
        }
    }
}
