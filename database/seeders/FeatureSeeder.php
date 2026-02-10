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
            'name' => ['en' => 'Secure'],
            'slug' => 'secure',
            'sort_order' => 0,
        ]);

        $secureItems = [
            'Certified by ISO/IEC 27001:2013',
            'Disaster Recovery Center Ready',
            'Fraud Detection System Ready',
            'Using Encryptions for Security',
            'Using Audit Trail System',
            'Trusted Agent',
            '24/7 Customer Service',
            'Secured by blacklist KYC',
            'Agent commitment on Non Disclosure Agreement',
            'Direct Connect with Bank API',
        ];

        foreach ($secureItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $secure->id,
                'title' => ['en' => $title],
                'sort_order' => $i,
            ]);
        }

        $smart = FeatureCategory::create([
            'name' => ['en' => 'Smart'],
            'slug' => 'smart',
            'sort_order' => 1,
        ]);

        $smartItems = [
            'User-friendly UI on BDPay Dashboard CMS',
            'Easy transfer to 136 Banks in Indonesia',
            'Historically Reports',
            'Digital Receipt via SMS, Whatsapp, Email',
            'Easy cancellations process',
            'Roadmap development that supports community needs',
        ];

        foreach ($smartItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $smart->id,
                'title' => ['en' => $title],
                'sort_order' => $i,
            ]);
        }

        $steady = FeatureCategory::create([
            'name' => ['en' => 'Steady'],
            'slug' => 'steady',
            'sort_order' => 2,
        ]);

        $steadyItems = [
            'Same day transfer',
            'Clean process and procedure',
            'Professional in-house Agent',
            'Distributed Agent all over Indonesia',
            'SLA Problem handling Days+1',
        ];

        foreach ($steadyItems as $i => $title) {
            FeatureItem::create([
                'feature_category_id' => $steady->id,
                'title' => ['en' => $title],
                'sort_order' => $i,
            ]);
        }
    }
}
