<?php

namespace Database\Seeders;

use App\Models\ChangelogVersion;
use App\Models\ChangelogItem;
use Illuminate\Database\Seeder;

class ChangelogSeeder extends Seeder
{
    public function run(): void
    {
        $version = ChangelogVersion::create([
            'version' => '2.1.0',
            'title' => ['en' => 'Contoh Changelog Aplikasi Kasir', 'id' => 'Contoh Changelog Aplikasi Kasir'],
            'release_date' => '2025-09-30',
            'sort_order' => 0,
        ]);

        $addedItems = [
            ['en' => 'Added standardized design for bank interfaces and modified the original design.', 'id' => 'Menambahkan desain standar untuk antarmuka bank dan memodifikasi desain asli.'],
            ['en' => 'Added Google verification for merchants to prevent account leakage and loss of balance', 'id' => 'Menambahkan verifikasi Google untuk merchant guna mencegah kebocoran akun dan kehilangan saldo'],
            ['en' => 'Added blacklist and whitelist data integration to judge some submitted data', 'id' => 'Menambahkan integrasi data blacklist dan whitelist untuk menilai beberapa data yang dikirim'],
            ['en' => 'Adding integration transition from test environment to production environment', 'id' => 'Menambahkan transisi integrasi dari lingkungan uji coba ke lingkungan produksi'],
            ['en' => 'Add business data information integration and submit for review', 'id' => 'Menambahkan integrasi informasi data bisnis dan pengajuan untuk ditinjau'],
            ['en' => 'Add report query display for daily data', 'id' => 'Menambahkan tampilan query laporan untuk data harian'],
        ];

        foreach ($addedItems as $i => $desc) {
            ChangelogItem::create([
                'changelog_version_id' => $version->id,
                'type' => 'added',
                'description' => $desc,
                'sort_order' => $i,
            ]);
        }

        $changedItems = [
            ['en' => 'Unify the status codes and notification status of user requests.', 'id' => 'Menyatukan kode status dan status notifikasi dari permintaan pengguna.'],
            ['en' => 'Modify the export function of report data to limit the maximum number of days for export', 'id' => 'Memodifikasi fungsi ekspor data laporan untuk membatasi jumlah hari maksimum ekspor'],
            ['en' => 'Modify the file upload function to prevent the intrusion of malicious programs', 'id' => 'Memodifikasi fungsi unggah file untuk mencegah masuknya program berbahaya'],
            ['en' => 'Modify the checksum judgment for illegal data', 'id' => 'Memodifikasi penilaian checksum untuk data ilegal'],
        ];

        foreach ($changedItems as $i => $desc) {
            ChangelogItem::create([
                'changelog_version_id' => $version->id,
                'type' => 'changed',
                'description' => $desc,
                'sort_order' => $i,
            ]);
        }
    }
}
