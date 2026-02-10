<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $cat1 = FaqCategory::create([
            'name' => ['en' => 'FAQ Products and Services'],
            'description' => ['en' => 'Questions about BDPay products and services'],
            'slug' => 'products-and-services',
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat1->id,
            'question' => ['en' => '1. What are BDPay services?'],
            'answer' => ['en' => '<p>BDPay helps you transfer to multiple accounts and electronic money at once at a lower price than conventional methods and provides a virtual account for the topup method.</p>'],
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat1->id,
            'question' => ['en' => '2. What virtual accounts does BDPay have?'],
            'answer' => ['en' => '<p>Currently at BDPay we have Virtual Accounts from several banks:</p><p>Bank Mandiri</p><p>BNI</p><p>We will continue to add to the completeness of the Bank for Virtual Account services</p>'],
            'sort_order' => 1,
        ]);

        $cat2 = FaqCategory::create([
            'name' => ['en' => 'FAQ API Integration'],
            'description' => ['en' => 'Questions about BDPay API integration stages and process'],
            'slug' => 'api-integration',
            'sort_order' => 1,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => "1. What's integration?"],
            'answer' => ['en' => "<p>Integration is the process of assimilation or unification of two or more systems so that they become a unified whole for a particular purpose. In this case, it is the process of connecting the BDPay system with the merchant's system/website, so that online transactions on the merchant's website can be carried out.</p>"],
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => '2. Why am I not receiving an HTTP response from the BDPay system?'],
            'answer' => ['en' => '<p>There are several things that can cause a merchant not to receive an HTTP response, including connections from the merchant, method errors when making requests and incorrect URL requests. This causes the BDPay system to be unable to accept requests from merchants and so there is no HTTP response from requests made by merchants.</p>'],
            'sort_order' => 1,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => '3. Is there complete documentation on the BDPay API?'],
            'answer' => ['en' => '<p>BDPay provides complete API documentation, as well as sample responses for each request which can be seen in the <a href="https://dc.bdpay.co.id/docs/" target="_blank" rel="noopener noreferrer">BDPay API documentation</a>.</p>'],
            'sort_order' => 2,
        ]);
    }
}
