<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'nama_product' => 'Yamaha XSR155',
            'product_slug' => 'yamaha-xsr155-1',
            'jenis' => 'Naked Bike',
            'merk' => 'Yamaha',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 20000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Harga Yamaha XSR 155 2023 di Indonesia dimulai dari Rp 36,58 Juta. Tersedia dalam 3 pilihan warna dan 1 varian di Indonesia. XSR 155 digerakkan oleh mesin 155 cc dengan transmisi 6-Kecepatan. Yamaha XSR 155 memiliki tinggi jok 810 mm dengan bobot 134 kg. Rem depan menggunakan Disc, sedangkan di belakang Disc. Lebih dari 6 pengguna telah memberikan penilaian untuk XSR 155 berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Yamaha XSR 155 adalah Ace 250 Twin, W175, Vixion dan Motobi 200 Evo.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://buletin-s.com/wp-content/uploads/2022/10/xsr155.webp'
        ], [
            'nama_product' => 'Beat 2022',
            'jenis' => 'Scooter',
            'product_slug' => 'yamaha-xsr155-2',
            'merk' => 'Honda',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 12000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Honda Beat 2023 tersedia dalam rentang harga Rp 17,72 - 18,57 Juta di Indonesia. Tersedia dalam 10 pilihan warna dan 3 varian di Indonesia. Beat digerakkan oleh mesin 110 cc dengan transmisi Variable Kecepatan. Honda Beat memiliki tinggi jok 740 mm dengan bobot 90 kg. Rem depan menggunakan Disc, sedangkan di belakang Drum. Lebih dari 1063 pengguna telah memberikan penilaian untuk Beat berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Honda Beat adalah Freego Connected, Beat Street, Vario 125 dan Scoopy.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/08/28/830903204.png'
        ], [
            'nama_product' => 'Yamaha XSR155',
            'jenis' => 'Naked Bike',
            'product_slug' => 'yamaha-xsr155-3',
            'merk' => 'Yamaha',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 20000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Harga Yamaha XSR 155 2023 di Indonesia dimulai dari Rp 36,58 Juta. Tersedia dalam 3 pilihan warna dan 1 varian di Indonesia. XSR 155 digerakkan oleh mesin 155 cc dengan transmisi 6-Kecepatan. Yamaha XSR 155 memiliki tinggi jok 810 mm dengan bobot 134 kg. Rem depan menggunakan Disc, sedangkan di belakang Disc. Lebih dari 6 pengguna telah memberikan penilaian untuk XSR 155 berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Yamaha XSR 155 adalah Ace 250 Twin, W175, Vixion dan Motobi 200 Evo.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://buletin-s.com/wp-content/uploads/2022/10/xsr155.webp'
        ], [
            'nama_product' => 'Honda Supra X125',
            'product_slug' => 'yamaha-xsr155-4',
            'jenis' => 'Moped',
            'merk' => 'Honda',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 9000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Honda Supra X 125 FI 2023 tersedia dalam rentang harga Rp 18,78 - 19,92 Juta di Indonesia. Tersedia dalam 2 pilihan warna dan 2 varian di Indonesia. Supra X 125 FI digerakkan oleh mesin 124.89 cc dengan transmisi 4-Speed. Rem depan menggunakan Disc, sedangkan di belakang Disc. Lebih dari 216 pengguna telah memberikan penilaian untuk Supra X 125 FI berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Honda Supra X 125 FI adalah ST125 Dax, Revo, Jupiter Z1 dan Beat.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://awsimages.detik.net.id/community/media/visual/2020/09/01/honda-supra-x-125.jpeg?w=700&q=90'
        ], [
            'nama_product' => 'Yamaha Aerox',
            'jenis' => 'Scooter',
            'product_slug' => 'yamaha-xsr155-5',
            'merk' => 'Yamaha',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 20000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Yamaha Aerox Connected 2023 tersedia dalam rentang harga Rp 27,08 - 31,11 Juta di Indonesia. Tersedia dalam 4 pilihan warna dan 2 varian di Indonesia. Aerox Connected digerakkan oleh mesin 155 cc dengan transmisi Variable Kecepatan. Yamaha Aerox Connected memiliki tinggi jok 790 mm dengan bobot 125 kg. Rem depan menggunakan Disc, sedangkan di belakang Drum. Lebih dari 1 pengguna telah memberikan penilaian untuk Aerox Connected berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Yamaha Aerox Connected adalah Freego Connected, Scoopy, Vario 125 dan Attila Venus 125i.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://cdni.autocarindia.com/Utils/ImageResizer.ashx?n=https://cdni.autocarindia.com/Reviews/_HSS2144%20(1).jpg&c=0'
        ], [
            'nama_product' => 'Honda Supra X125',
            'jenis' => 'Moped',
            'product_slug' => 'yamaha-xsr155-6',
            'merk' => 'Honda',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 9000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Honda Supra X 125 FI 2023 tersedia dalam rentang harga Rp 18,78 - 19,92 Juta di Indonesia. Tersedia dalam 2 pilihan warna dan 2 varian di Indonesia. Supra X 125 FI digerakkan oleh mesin 124.89 cc dengan transmisi 4-Speed. Rem depan menggunakan Disc, sedangkan di belakang Disc. Lebih dari 216 pengguna telah memberikan penilaian untuk Supra X 125 FI berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Honda Supra X 125 FI adalah ST125 Dax, Revo, Jupiter Z1 dan Beat.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://awsimages.detik.net.id/community/media/visual/2020/09/01/honda-supra-x-125.jpeg?w=700&q=90'
        ], [
            'nama_product' => 'Yamaha Aerox',
            'jenis' => 'Scooter',
            'product_slug' => 'yamaha-xsr155-7',
            'merk' => 'Yamaha',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 20000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Yamaha Aerox Connected 2023 tersedia dalam rentang harga Rp 27,08 - 31,11 Juta di Indonesia. Tersedia dalam 4 pilihan warna dan 2 varian di Indonesia. Aerox Connected digerakkan oleh mesin 155 cc dengan transmisi Variable Kecepatan. Yamaha Aerox Connected memiliki tinggi jok 790 mm dengan bobot 125 kg. Rem depan menggunakan Disc, sedangkan di belakang Drum. Lebih dari 1 pengguna telah memberikan penilaian untuk Aerox Connected berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Yamaha Aerox Connected adalah Freego Connected, Scoopy, Vario 125 dan Attila Venus 125i.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://cdni.autocarindia.com/Utils/ImageResizer.ashx?n=https://cdni.autocarindia.com/Reviews/_HSS2144%20(1).jpg&c=0'
        ], [
            'nama_product' => 'Beat 2022',
            'jenis' => 'Scooter',
            'product_slug' => 'yamaha-xsr155-8',
            'merk' => 'Honda',
            'nomor_mesin' => 'CBN803491',
            'harga_awal' => 12000000,
            'kapasitas_cc' => 155,
            'bahan_bakar' => 'Bensin',
            'odometer' => 300,
            'nomor_rangka' => 'JJMNKSM982H6KL',
            'warna' => 'Hitam',
            'deskripsi' => 'Honda Beat 2023 tersedia dalam rentang harga Rp 17,72 - 18,57 Juta di Indonesia. Tersedia dalam 10 pilihan warna dan 3 varian di Indonesia. Beat digerakkan oleh mesin 110 cc dengan transmisi Variable Kecepatan. Honda Beat memiliki tinggi jok 740 mm dengan bobot 90 kg. Rem depan menggunakan Disc, sedangkan di belakang Drum. Lebih dari 1063 pengguna telah memberikan penilaian untuk Beat berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Honda Beat adalah Freego Connected, Beat Street, Vario 125 dan Scoopy.',
            'nomor_polisi' => 'K 1287 MUN',
            'masa_stnk' => '2023-01-30T08:22',
            'stnk' => true,
            'bpkb' => true,
            'form_a' => true,
            'faktur' => true,
            'kwitansi_blanko' => true,
            'img_url' => 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/08/28/830903204.png'
        ]];

        DB::table('products')->insert($data);
    }
}