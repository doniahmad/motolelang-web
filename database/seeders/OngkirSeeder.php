<?php

namespace Database\Seeders;

use App\Models\Ongkir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOngkir = [
            [
                'nama_daerah' => 'Kabupaten Banjarnegara',
                'ongkir' => 450000
            ],
            [
                'nama_daerah' => 'Kabupaten Banyumas',
                'ongkir' => 500000
            ],
            [
                'nama_daerah' => 'Kabupaten Batang',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kabupaten Blora',
                'ongkir' => 300000
            ],
            [
                'nama_daerah' => 'Kabupaten Boyolali',
                'ongkir' => 300000
            ],
            [
                'nama_daerah' => 'Kabupaten Brebes',
                'ongkir' => 550000
            ],
            [
                'nama_daerah' => 'Kabupaten Cilacap',
                'ongkir' => 550000
            ],
            [
                'nama_daerah' => 'Kabupaten Demak',
                'ongkir' => 200000
            ],
            [
                'nama_daerah' => 'Kabupaten Grobogan',
                'ongkir' => 200000
            ],
            [
                'nama_daerah' => 'Kabupaten Jepara',
                'ongkir' => 200000
            ],
            [
                'nama_daerah' => 'Kabupaten Karanganyar',
                'ongkir' => 350000
            ],
            [

                'nama_daerah' => 'Kabupaten Kebumen',
                'ongkir' => 600000
            ],
            [
                'nama_daerah' => 'Kabupaten Kendal',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kabupaten Klaten',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kabupaten Kudus',
                'ongkir' => 100000
            ],
            [
                'nama_daerah' => 'Kabupaten Magelang',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kabupaten Pati',
                'ongkir' => 200000
            ],
            [
                'nama_daerah' => 'Kabupaten Pekalongan',
                'ongkir' => 400000
            ],
            [
                'nama_daerah' => 'Kabupaten Pemalang',
                'ongkir' => 450000
            ],
            [
                'nama_daerah' => 'Kabupaten Purbalingga',
                'ongkir' => 500000
            ],
            [
                'nama_daerah' => 'Kabupaten Purworejo',
                'ongkir' => 600000
            ],
            [
                'nama_daerah' => 'Kabupaten Rembang',
                'ongkir' => 250000
            ],
            [
                'nama_daerah' => 'Kabupaten Semarang',
                'ongkir' => 300000
            ],
            [
                'nama_daerah' => 'Kabupaten Sragen',
                'ongkir' => 300000
            ],
            [
                'nama_daerah' => 'Kabupaten Sukoharjo',
                'ongkir' => 400000
            ],
            [
                'nama_daerah' => 'Kabupaten Tegal',
                'ongkir' => 500000
            ],
            [
                'nama_daerah' => 'Kabupaten Temanggung',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kabupaten Wonogiri',
                'ongkir' => 600000
            ],
            [
                'nama_daerah' => 'Kabupaten Wonosobo',
                'ongkir' => 400000
            ],
            [
                'nama_daerah' => 'Kota Magelang',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kota Pekalongan',
                'ongkir' => 400000
            ],
            [
                'nama_daerah' => 'Kota Salatiga',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kota Semarang',
                'ongkir' => 300000
            ],
            [
                'nama_daerah' => 'Kota Surakarta',
                'ongkir' => 350000
            ],
            [
                'nama_daerah' => 'Kota Tegal',
                'ongkir' => 500000
            ]
        ];

        Ongkir::insert($dataOngkir);
    }
}
