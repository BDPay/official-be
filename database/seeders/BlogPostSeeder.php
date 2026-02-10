<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => ['en' => 'Penjelasan Lengkap 5 Peran Bank Indonesia dalam Sistem Pembayaran'],
                'slug' => 'peran-bank-indonesia-dalam-sistem-pembayaran',
                'excerpt' => ['en' => 'Tahukah Anda apa saja peran Bank Indonesia dalam sistem pembayaran? Bank Indones...'],
                'content' => ['en' => '<p>Tahukah Anda apa saja peran Bank Indonesia dalam sistem pembayaran?</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/f48f1c48574c0c46ba763903981f3427_ec6569b8878a8c62ec2f2d5166688b8a_compressed.jpg',
                'published_at' => '2021-11-24',
                'is_published' => true,
            ],
            [
                'title' => ['en' => 'Planning adalah Kunci Keberhasilan Bisnis. Ini Cara Membuatnya'],
                'slug' => 'planning-adalah',
                'excerpt' => ['en' => 'Anda punya mimpi untuk memulai bisnis? Mulainya dengan planning. Sebab, planning...'],
                'content' => ['en' => '<p>Anda punya mimpi untuk memulai bisnis? Mulainya dengan planning.</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/c99508ac0a2e78fbf7e42e80816231bc_a62b2cdaea9f3815e552cdc103f96773_compressed.jpg',
                'published_at' => '2021-11-23',
                'is_published' => true,
            ],
            [
                'title' => ['en' => 'Refund adalah Layanan Penting dalam Bisnis. Ini Penjelasan Lengkapnya'],
                'slug' => 'refund-adalah',
                'excerpt' => ['en' => 'Refund adalah sistem yang penting dalam transaksi jual-beli sekarang ini. Sistem...'],
                'content' => ['en' => '<p>Refund adalah sistem yang penting dalam transaksi jual-beli sekarang ini.</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/4e3d7261783ec484fa8cf3e968b0811f_0d2e81a4e44a944a6a8713f32481f34b_compressed.jpg',
                'published_at' => '2021-11-21',
                'is_published' => true,
            ],
            [
                'title' => ['en' => 'Apa itu Payment: Pengertian dan Jenis-jenis Payment di Indonesia'],
                'slug' => 'apa-itu-payment',
                'excerpt' => ['en' => 'Apa itu Payment dan Jenis-jenisnya di Indonesia - Aktivitas belanja di masa seka...'],
                'content' => ['en' => '<p>Apa itu Payment dan Jenis-jenisnya di Indonesia.</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/34e8c07bbedc3326e71f655ddb62b7e9_ff60e85dd27afc9cce893757f6c246c5_compressed.jpg',
                'published_at' => '2021-11-17',
                'is_published' => true,
            ],
            [
                'title' => ['en' => 'Pebisnis Wajib Tahu. Ini 5 Fungsi Turunan Uang Selain Alat Tukar'],
                'slug' => 'fungsi-turunan-uang',
                'excerpt' => ['en' => 'Apa saja fungsi turunan uang? Secara garis besar, uang memiliki dua fungsi, yait...'],
                'content' => ['en' => '<p>Apa saja fungsi turunan uang?</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/aec6a04fa2105b31f69d1380b4d79cc2_343768f9262a21504e322983c9b79b8c_compressed.jpg',
                'published_at' => '2021-11-10',
                'is_published' => true,
            ],
            [
                'title' => ['en' => 'Tugas dan Fungsi Administrasi Keuangan pada Bisnis'],
                'slug' => 'fungsi-administrasi-keuangan',
                'excerpt' => ['en' => 'Setiap pebisnis perlu mengetahui pentingnya fungsi administrasi keuangan. Dalam...'],
                'content' => ['en' => '<p>Setiap pebisnis perlu mengetahui pentingnya fungsi administrasi keuangan.</p>'],
                'image' => 'https://storage.googleapis.com/go-merchant-production.appspot.com/uploads/2021/11/797ee69354fa7264689090a663cb7bd8_39b2d300c5dc1e332c376e1294fe9342_compressed.jpg',
                'published_at' => '2021-11-01',
                'is_published' => true,
            ],
        ];

        foreach ($posts as $index => $post) {
            BlogPost::create(array_merge($post, ['sort_order' => $index]));
        }
    }
}
