<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            AdminUserSeeder::class,
            BlogPostSeeder::class,
            FaqSeeder::class,
            ChangelogSeeder::class,
            FeatureSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            AgentSeeder::class,
            ServiceSeeder::class,
            HomepageSectionSeeder::class,
            TrustIndicatorSeeder::class,
            ServiceHighlightSeeder::class,
        ]);
    }
}
