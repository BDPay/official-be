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
            'title' => ['en' => 'Contoh Changelog Aplikasi Kasir'],
            'release_date' => '2025-09-30',
            'sort_order' => 0,
        ]);

        $addedItems = [
            'Added standardized design for bank interfaces and modified the original design.',
            'Added Google verification for merchants to prevent account leakage and loss of balance',
            'Added blacklist and whitelist data integration to judge some submitted data',
            'Adding integration transition from test environment to production environment',
            'Add business data information integration and submit for review',
            'Add report query display for daily data',
        ];

        foreach ($addedItems as $i => $desc) {
            ChangelogItem::create([
                'changelog_version_id' => $version->id,
                'type' => 'added',
                'description' => ['en' => $desc],
                'sort_order' => $i,
            ]);
        }

        $changedItems = [
            'Unify the status codes and notification status of user requests.',
            'Modify the export function of report data to limit the maximum number of days for export',
            'Modify the file upload function to prevent the intrusion of malicious programs',
            'Modify the checksum judgment for illegal data',
        ];

        foreach ($changedItems as $i => $desc) {
            ChangelogItem::create([
                'changelog_version_id' => $version->id,
                'type' => 'changed',
                'description' => ['en' => $desc],
                'sort_order' => $i,
            ]);
        }
    }
}
