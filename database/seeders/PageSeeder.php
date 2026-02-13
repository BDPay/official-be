<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'slug' => 'terms-and-conditions',
            'title' => ['en' => 'Terms and Conditions', 'id' => 'Syarat dan Ketentuan'],
            'content' => ['en' => $this->termsContentEn(), 'id' => $this->termsContentId()],
            'is_published' => true,
        ]);

        Page::create([
            'slug' => 'privacy',
            'title' => ['en' => 'Privacy Policy', 'id' => 'Kebijakan Privasi'],
            'content' => ['en' => $this->privacyContentEn(), 'id' => $this->privacyContentId()],
            'is_published' => true,
        ]);

        Page::create([
            'slug' => 'disclaimer',
            'title' => ['en' => 'Disclaimer', 'id' => 'Disclaimer'],
            'content' => ['en' => $this->disclaimerContentEn(), 'id' => $this->disclaimerContentId()],
            'is_published' => true,
        ]);
    }

    private function termsContentEn(): string
    {
        return <<<'HTML'
<h4>Introduction</h4>
<p>By using the bdPay service, the User ("you") agrees to be bound by and enter into a service agreement ("Agreement") and to comply with the bdPay Terms and Conditions of Use ("Terms & Conditions" or "T&C") as follows.</p>
<p>These T&C govern your use of and access to the services operated by PT Berkah Digital Pembayaran and/or its affiliates ("bdPay", "we", or "us") ("Services").</p>
<p>By clicking "Register" on the website <a href="https://www.bdpay.co.id"><strong>www.bdpay.co.id</strong></a> and signing the Agreement, you represent that you have read, understood and agree to be bound by the T&C, including the privacy policy.</p>
<p>If you do not agree with (or cannot comply with) the Agreement, you must not use the Services, but please notify us by emailing <a href="mailto:cs@bdpay.co.id"><strong>cs@bdpay.co.id</strong></a> so we can try to find a solution.</p>

<h4>Definitions and Interpretation</h4>
<p>In these T&C, unless the context otherwise requires, capitalized terms have the following meanings:</p>
<ul>
<li><strong>"API"</strong> means software that facilitates message exchange including Instructions, service-related documents, source code, and any materials for purposes related to the Services.</li>
<li><strong>"Service Fees"</strong> means any fees charged by us to you in connection with the successful provision of the Services.</li>
<li><strong>"Applicable Law"</strong> means laws, statutes, orders, regulations, rules, requirements, practices and guidance of any governmental, regulatory or other competent authority.</li>
<li><strong>"Instructions"</strong> means orders or initiations, in electronic form from you to us to process Transactions.</li>
<li><strong>"bdPay Dashboard"</strong> means the web-based platform provided and managed by us for your use in connection with the Services.</li>
<li><strong>"Transaction"</strong> means a series of activities carried out based on Instructions by you to us in accordance with the use of the Services.</li>
</ul>

<h4>Use of the Services</h4>
<p>Subject to the T&C and the Agreement, you are granted a limited, non-exclusive, non-transferable, non-sublicensable, revocable right to access and use the Services.</p>

<h4>Account Creation</h4>
<p>To access and use the Services, you must register and create an account ("Account") on the bdPay Dashboard.</p>

<h4>Services & Payment</h4>
<p>Access to the Services or certain features may require payment to bdPay.</p>

<h4>Refunds</h4>
<p>We will issue refunds for Contracts within 30 days from the initial purchase of the Contract.</p>

<h4>Prohibited Uses</h4>
<p>You may use the Services only for lawful purposes.</p>

<h4>Intellectual Property Rights</h4>
<p>The Services and all original content, features and functionality are and will remain the exclusive property of BDPay.</p>

<h4>Disclaimer of Warranties</h4>
<p>THE SERVICES ARE PROVIDED BY THE COMPANY "AS IS" AND "AS AVAILABLE".</p>

<h4>Limitation of Liability</h4>
<p>EXCEPT AS PROHIBITED BY LAW, YOU WILL INDEMNIFY AND HOLD HARMLESS THE COMPANY AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS.</p>

<h4>Termination</h4>
<p>We may terminate or suspend your account and bar access to the Services immediately, without notice or liability, at our sole discretion, for any reason.</p>

<h4>Governing Law</h4>
<p>These Terms shall be governed and construed in accordance with the laws of Indonesia.</p>

<h4>Questions & Contact Information</h4>
<p>This service is provided by PT Berkah Digital Pembayaran, located at Royal Square Lt 3A Jl Raya Menganti No. 479, Babatan, Wiyung, Surabaya 60227. If you have any questions about these Terms, please contact us at <a href="mailto:cs@bdpay.co.id"><strong>cs@bdpay.co.id</strong></a>.</p>
HTML;
    }

    private function termsContentId(): string
    {
        return <<<'HTML'
<h4>Pendahuluan</h4>
<p>Dengan menggunakan layanan bdPay, Pengguna ("Anda") setuju untuk terikat dan menandatangani perjanjian layanan ("Perjanjian") serta mematuhi Syarat dan Ketentuan Penggunaan bdPay ("Syarat & Ketentuan" atau "S&K") sebagai berikut.</p>
<p>S&K ini mengatur penggunaan dan akses Anda terhadap layanan yang dioperasikan oleh PT Berkah Digital Pembayaran dan/atau afiliasinya ("bdPay", "kami") ("Layanan").</p>
<p>Dengan mengklik "Daftar" di situs web <a href="https://www.bdpay.co.id"><strong>www.bdpay.co.id</strong></a> dan menandatangani Perjanjian, Anda menyatakan bahwa Anda telah membaca, memahami, dan setuju untuk terikat oleh S&K, termasuk kebijakan privasi.</p>
<p>Jika Anda tidak setuju dengan (atau tidak dapat mematuhi) Perjanjian, Anda tidak boleh menggunakan Layanan, namun silakan beritahu kami melalui email <a href="mailto:cs@bdpay.co.id"><strong>cs@bdpay.co.id</strong></a> agar kami dapat mencari solusi.</p>

<h4>Definisi dan Interpretasi</h4>
<p>Dalam S&K ini, kecuali konteks menghendaki lain, istilah-istilah berikut memiliki arti sebagai berikut:</p>
<ul>
<li><strong>"API"</strong> berarti perangkat lunak yang memfasilitasi pertukaran pesan termasuk Instruksi, dokumen terkait layanan, kode sumber, dan materi apa pun untuk tujuan yang terkait dengan Layanan.</li>
<li><strong>"Biaya Layanan"</strong> berarti biaya apa pun yang dikenakan oleh kami kepada Anda sehubungan dengan penyediaan Layanan yang berhasil.</li>
<li><strong>"Hukum yang Berlaku"</strong> berarti undang-undang, statuta, perintah, peraturan, aturan, persyaratan, praktik, dan panduan dari pemerintah, regulator, atau otoritas kompeten lainnya.</li>
<li><strong>"Instruksi"</strong> berarti perintah atau inisiasi, dalam bentuk elektronik dari Anda kepada kami untuk memproses Transaksi.</li>
<li><strong>"Dashboard bdPay"</strong> berarti platform berbasis web yang disediakan dan dikelola oleh kami untuk penggunaan Anda sehubungan dengan Layanan.</li>
<li><strong>"Transaksi"</strong> berarti serangkaian kegiatan yang dilakukan berdasarkan Instruksi oleh Anda kepada kami sesuai dengan penggunaan Layanan.</li>
</ul>

<h4>Penggunaan Layanan</h4>
<p>Tunduk pada S&K dan Perjanjian, Anda diberikan hak terbatas, non-eksklusif, tidak dapat dipindahtangankan, tidak dapat disublisensikan, dan dapat dicabut untuk mengakses dan menggunakan Layanan.</p>

<h4>Pembuatan Akun</h4>
<p>Untuk mengakses dan menggunakan Layanan, Anda harus mendaftar dan membuat akun ("Akun") di Dashboard bdPay.</p>

<h4>Layanan & Pembayaran</h4>
<p>Akses ke Layanan atau fitur tertentu mungkin memerlukan pembayaran kepada bdPay.</p>

<h4>Pengembalian Dana</h4>
<p>Kami akan mengeluarkan pengembalian dana untuk Kontrak dalam waktu 30 hari sejak pembelian awal Kontrak.</p>

<h4>Penggunaan yang Dilarang</h4>
<p>Anda hanya boleh menggunakan Layanan untuk tujuan yang sah.</p>

<h4>Hak Kekayaan Intelektual</h4>
<p>Layanan dan semua konten asli, fitur, dan fungsionalitas adalah dan akan tetap menjadi milik eksklusif BDPay.</p>

<h4>Penafian Garansi</h4>
<p>LAYANAN DISEDIAKAN OLEH PERUSAHAAN "APA ADANYA" DAN "SEBAGAIMANA TERSEDIA".</p>

<h4>Batasan Tanggung Jawab</h4>
<p>KECUALI DILARANG OLEH HUKUM, ANDA AKAN MENGGANTI RUGI DAN MEMBEBASKAN PERUSAHAAN SERTA PEJABAT, DIREKTUR, KARYAWAN, DAN AGENNYA.</p>

<h4>Pengakhiran</h4>
<p>Kami dapat mengakhiri atau menangguhkan akun Anda dan melarang akses ke Layanan segera, tanpa pemberitahuan atau tanggung jawab, atas kebijakan kami sendiri, untuk alasan apa pun.</p>

<h4>Hukum yang Mengatur</h4>
<p>Syarat ini akan diatur dan ditafsirkan sesuai dengan hukum Indonesia.</p>

<h4>Pertanyaan & Informasi Kontak</h4>
<p>Layanan ini disediakan oleh PT Berkah Digital Pembayaran, berlokasi di Royal Square Lt 3A Jl Raya Menganti No. 479, Babatan, Wiyung, Surabaya 60227. Jika Anda memiliki pertanyaan tentang Syarat ini, silakan hubungi kami di <a href="mailto:cs@bdpay.co.id"><strong>cs@bdpay.co.id</strong></a>.</p>
HTML;
    }

    private function privacyContentEn(): string
    {
        return <<<'HTML'
<h4>Log Files</h4>
<p>bdpay.co.id follows a standard procedure of using log files. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.</p>

<h4>Cookies and Web Beacons</h4>
<p>Like any other website, bdpay.co.id uses "cookies". These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited.</p>

<h4>Privacy Policies</h4>
<p>Third-party ad servers or ad networks use technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on bdpay.co.id.</p>

<h4>Third Party Privacy Policies</h4>
<p>bdpay.co.id's Privacy Policy does not apply to other advertisers or websites.</p>

<h4>Children's Information</h4>
<p>Another part of our priority is adding protection for children while using the internet.</p>

<h4>Online Privacy Policy Only</h4>
<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website.</p>

<h4>Consent</h4>
<p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
HTML;
    }

    private function privacyContentId(): string
    {
        return <<<'HTML'
<h4>File Log</h4>
<p>bdpay.co.id mengikuti prosedur standar penggunaan file log. Informasi yang dikumpulkan oleh file log meliputi alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), cap tanggal dan waktu, halaman rujukan/keluar, dan kemungkinan jumlah klik.</p>

<h4>Cookies dan Web Beacons</h4>
<p>Seperti situs web lainnya, bdpay.co.id menggunakan "cookies". Cookies ini digunakan untuk menyimpan informasi termasuk preferensi pengunjung, dan halaman-halaman di situs web yang diakses atau dikunjungi pengunjung.</p>

<h4>Kebijakan Privasi</h4>
<p>Server iklan pihak ketiga atau jaringan iklan menggunakan teknologi seperti cookies, JavaScript, atau Web Beacons yang digunakan dalam iklan dan tautan masing-masing yang muncul di bdpay.co.id.</p>

<h4>Kebijakan Privasi Pihak Ketiga</h4>
<p>Kebijakan Privasi bdpay.co.id tidak berlaku untuk pengiklan atau situs web lain.</p>

<h4>Informasi Anak-anak</h4>
<p>Bagian lain dari prioritas kami adalah menambahkan perlindungan untuk anak-anak saat menggunakan internet.</p>

<h4>Kebijakan Privasi Online Saja</h4>
<p>Kebijakan Privasi ini hanya berlaku untuk aktivitas online kami dan berlaku untuk pengunjung situs web kami.</p>

<h4>Persetujuan</h4>
<p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui Syarat dan Ketentuannya.</p>
HTML;
    }

    private function disclaimerContentEn(): string
    {
        return <<<'HTML'
<p><strong>WEBSITE DISCLAIMER</strong></p>
<p>The information provided by BDPay ("Company", "we", "our", "us") on bdpay.co.id (the "Site") is for general informational purposes only.</p>
<p>UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE.</p>

<p><strong>EXTERNAL LINKS DISCLAIMER</strong></p>
<p>The Site may contain links to other websites or content belonging to or originating from third parties.</p>

<p><strong>PROFESSIONAL DISCLAIMER</strong></p>
<p>The Site can not and does not contain financial advice. The information is provided for general informational and educational purposes only.</p>

<p><strong>ERRORS AND OMISSIONS DISCLAIMER</strong></p>
<p>While we have made every attempt to ensure that the information contained in this site has been obtained from reliable sources, BDPay is not responsible for any errors or omissions.</p>

<p><strong>LOGOS AND TRADEMARKS DISCLAIMER</strong></p>
<p>All logos and trademarks of third parties referenced on bdpay.co.id are the trademarks and logos of their respective owners.</p>

<p><strong>CONTACT US</strong></p>
<p>Should you have any feedback, comments, requests for technical support or other inquiries, please contact us by email: <strong>cs@bdpay.co.id</strong>.</p>
HTML;
    }

    private function disclaimerContentId(): string
    {
        return <<<'HTML'
<p><strong>DISCLAIMER SITUS WEB</strong></p>
<p>Informasi yang disediakan oleh BDPay ("Perusahaan", "kami") di bdpay.co.id ("Situs") hanya untuk tujuan informasi umum.</p>
<p>DALAM KEADAAN APA PUN KAMI TIDAK BERTANGGUNG JAWAB KEPADA ANDA ATAS KERUGIAN ATAU KERUSAKAN APA PUN YANG TIMBUL SEBAGAI AKIBAT DARI PENGGUNAAN SITUS ATAU KETERGANTUNGAN PADA INFORMASI APA PUN YANG DISEDIAKAN DI SITUS.</p>

<p><strong>DISCLAIMER TAUTAN EKSTERNAL</strong></p>
<p>Situs mungkin berisi tautan ke situs web lain atau konten milik atau berasal dari pihak ketiga.</p>

<p><strong>DISCLAIMER PROFESIONAL</strong></p>
<p>Situs tidak dapat dan tidak berisi nasihat keuangan. Informasi disediakan hanya untuk tujuan informasi umum dan edukasi.</p>

<p><strong>DISCLAIMER KESALAHAN DAN KELALAIAN</strong></p>
<p>Meskipun kami telah berusaha keras untuk memastikan bahwa informasi yang terkandung dalam situs ini diperoleh dari sumber yang dapat diandalkan, BDPay tidak bertanggung jawab atas kesalahan atau kelalaian apa pun.</p>

<p><strong>DISCLAIMER LOGO DAN MEREK DAGANG</strong></p>
<p>Semua logo dan merek dagang pihak ketiga yang direferensikan di bdpay.co.id adalah merek dagang dan logo dari pemiliknya masing-masing.</p>

<p><strong>HUBUNGI KAMI</strong></p>
<p>Jika Anda memiliki umpan balik, komentar, permintaan dukungan teknis, atau pertanyaan lainnya, silakan hubungi kami melalui email: <strong>cs@bdpay.co.id</strong>.</p>
HTML;
    }
}
