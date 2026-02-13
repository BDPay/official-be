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
            'name' => ['en' => 'FAQ Products and Services', 'id' => 'FAQ Produk dan Layanan'],
            'description' => ['en' => 'Questions about BDPay products and services', 'id' => 'Pertanyaan seputar produk dan layanan BDPay'],
            'slug' => 'products-and-services',
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat1->id,
            'question' => ['en' => '1. What are BDPay services?', 'id' => '1. Apa saja layanan BDPay?'],
            'answer' => ['en' => '<p>BDPay helps you transfer to multiple accounts and electronic money at once at a lower price than conventional methods and provides a virtual account for the topup method.</p>', 'id' => '<p>BDPay membantu Anda melakukan transfer ke beberapa rekening dan uang elektronik sekaligus dengan harga lebih murah dari metode konvensional serta menyediakan virtual account untuk metode top up.</p>'],
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat1->id,
            'question' => ['en' => '2. What virtual accounts does BDPay have?', 'id' => '2. Virtual account apa saja yang dimiliki BDPay?'],
            'answer' => ['en' => '<p>Currently at BDPay we have Virtual Accounts from several banks:</p><p>Bank Mandiri</p><p>BNI</p><p>We will continue to add to the completeness of the Bank for Virtual Account services</p>', 'id' => '<p>Saat ini di BDPay kami memiliki Virtual Account dari beberapa bank:</p><p>Bank Mandiri</p><p>BNI</p><p>Kami akan terus menambah kelengkapan Bank untuk layanan Virtual Account</p>'],
            'sort_order' => 1,
        ]);

        $cat2 = FaqCategory::create([
            'name' => ['en' => 'FAQ API Integration', 'id' => 'FAQ Integrasi API'],
            'description' => ['en' => 'Questions about BDPay API integration stages and process', 'id' => 'Pertanyaan seputar tahapan dan proses integrasi API BDPay'],
            'slug' => 'api-integration',
            'sort_order' => 1,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => "1. What's integration?", 'id' => '1. Apa itu integrasi?'],
            'answer' => ['en' => "<p>Integration is the process of assimilation or unification of two or more systems so that they become a unified whole for a particular purpose. In this case, it is the process of connecting the BDPay system with the merchant's system/website, so that online transactions on the merchant's website can be carried out.</p>", 'id' => '<p>Integrasi adalah proses penggabungan atau penyatuan dua atau lebih sistem sehingga menjadi satu kesatuan utuh untuk tujuan tertentu. Dalam hal ini, integrasi adalah proses menghubungkan sistem BDPay dengan sistem/website merchant, sehingga transaksi online di website merchant dapat dilakukan.</p>'],
            'sort_order' => 0,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => '2. Why am I not receiving an HTTP response from the BDPay system?', 'id' => '2. Mengapa saya tidak menerima respons HTTP dari sistem BDPay?'],
            'answer' => ['en' => '<p>There are several things that can cause a merchant not to receive an HTTP response, including connections from the merchant, method errors when making requests and incorrect URL requests. This causes the BDPay system to be unable to accept requests from merchants and so there is no HTTP response from requests made by merchants.</p>', 'id' => '<p>Ada beberapa hal yang dapat menyebabkan merchant tidak menerima respons HTTP, di antaranya koneksi dari merchant, kesalahan metode saat melakukan request, dan URL request yang salah. Hal ini menyebabkan sistem BDPay tidak dapat menerima request dari merchant sehingga tidak ada respons HTTP dari request yang dilakukan merchant.</p>'],
            'sort_order' => 1,
        ]);

        FaqItem::create([
            'faq_category_id' => $cat2->id,
            'question' => ['en' => '3. Is there complete documentation on the BDPay API?', 'id' => '3. Apakah ada dokumentasi lengkap tentang API BDPay?'],
            'answer' => ['en' => '<p>BDPay provides complete API documentation, as well as sample responses for each request which can be seen in the <a href="https://dc.bdpay.co.id/docs/" target="_blank" rel="noopener noreferrer">BDPay API documentation</a>.</p>', 'id' => '<p>BDPay menyediakan dokumentasi API yang lengkap, serta contoh respons untuk setiap request yang dapat dilihat di <a href="https://dc.bdpay.co.id/docs/" target="_blank" rel="noopener noreferrer">dokumentasi API BDPay</a>.</p>'],
            'sort_order' => 2,
        ]);
    }
}
