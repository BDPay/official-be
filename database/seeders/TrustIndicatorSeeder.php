<?php

namespace Database\Seeders;

use App\Models\TrustIndicator;
use Illuminate\Database\Seeder;

class TrustIndicatorSeeder extends Seeder
{
    public function run(): void
    {
        $banks = [
            ['name' => 'Mandiri', 'logo' => '/img/bank_mandiri.png', 'row_group' => 1, 'sort_order' => 0],
            ['name' => 'BNI', 'logo' => '/img/bank_bni.png', 'row_group' => 1, 'sort_order' => 1],
            ['name' => 'Permata', 'logo' => '/img/bank_permata.png', 'row_group' => 1, 'sort_order' => 2],
            ['name' => 'BSI', 'logo' => '/img/bank_bsi.png', 'row_group' => 1, 'sort_order' => 3],
            ['name' => 'BCA', 'logo' => '/img/bank_bca.png', 'row_group' => 1, 'sort_order' => 4],
            ['name' => 'BNC', 'logo' => '/img/bank_bnc.png', 'row_group' => 1, 'sort_order' => 5],
            ['name' => 'BRI', 'logo' => '/img/bank_bri.png', 'row_group' => 2, 'sort_order' => 6],
            ['name' => 'COD', 'logo' => '/img/bank_cod.png', 'row_group' => 2, 'sort_order' => 7],
        ];

        foreach ($banks as $bank) {
            TrustIndicator::create(array_merge($bank, ['is_active' => true]));
        }
    }
}
