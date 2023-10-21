<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            //Ikan Laut
            [
                'nama_produk'           => 'Ikan Kakap Merah',
                'stok_produk'                  => '25',
                'harga'                 => '150000',
                'hargalangsung'         => '225000',
                'hargabersih'           => '375000',
                'hargafillet'           => '630000',
                'foto_produk'            => 'kakap.png',
                'detail_produk'         => 'Ikan Kakap Merah dengan kandungan kaya akan protein diambil dengan kualitas yang sangat fresh',
                'status'                => 'Ada',
                'id_nelayan'            => '1',
                'id_kategori'           => '1',
            ],
            [
                'nama_produk'           => 'Ikan Salmon',
                'stok_produk'                  => '25',
                'harga'                 => '250500',
                'hargalangsung'         => '375750',
                'hargabersih'           => '626250',
                'hargafillet'           => '1052100',
                'foto_produk'            => 'ikan salmnon fillet.jpg',
                'detail_produk'         => 'Ikan Salmon dengan kandungan kaya akan protein dan omega 3 diambil dengan kualitas yang sangat fresh',
                'status'                => 'Ada',
                'id_nelayan'            => '1',
                'id_kategori'           => '1',
            ],
            //Ikan Tawar
            [
                'nama_produk'           => 'Ikan Lele',
                'stok_produk'                  => '25',
                'harga'                 => '25000',
                'hargalangsung'         => '37500',
                'hargabersih'           => '62600',
                'hargafillet'           => '105000',
                'foto_produk'            => 'lele.jpg',
                'detail_produk'         => 'Ikan Lele dengan kandungan kaya akan protein diambil dengan kualitas yang sangat fresh dapat diolah menjadi berbagai macam masakan',
                'status'                => 'Ada',
                'id_nelayan'            => '2',
                'id_kategori'           => '2',
            ],
            [
                'nama_produk'           => 'Udang Jebung',
                'stok_produk'                  => '25',
                'harga'                 => '31500',
                'hargalangsung'         => '47250',
                'hargabersih'           => '78750',
                'hargafillet'           => '132300',
                'foto_produk'            => 'udang jerbung.jpg',
                'detail_produk'         => 'Udang Jebung kaya akan omega 3 diambil dengan kualitas yang sangat fresh',
                'status'                => 'Ada',
                'id_nelayan'            => '2',
                'id_kategori'           => '2',
            ],

            //Olahan Ikan
            [
                'nama_produk'           => 'Keripik Kerang',
                'stok_produk'                  => '25',
                'harga'                 => '60250',
                'hargalangsung'         => '0',
                'hargabersih'           => '0',
                'hargafillet'           => '0',
                'foto_produk'            => 'keripik.jpg',
                'detail_produk'         => 'Keripik Kerang dari bahan 100% fresh kerang asli dan diolah dengan teknologi paling baru',
                'status'                => 'Ada',
                'id_nelayan'            => '2',
                'id_kategori'           => '3',
            ],
            [
                'nama_produk'           => 'Kerupuk Udang',
                'stok_produk'                  => '25',
                'harga'                 => '25000',
                'hargalangsung'         => '0',
                'hargabersih'           => '0',
                'hargafillet'           => '0',
                'foto_produk'            => 'kerpukuk udang.jpg',
                'detail_produk'         => 'Kerupuk udang mentah dari bahan yang 100% fresh dengan minimum campuran',
                'status'                => 'Ada',
                'id_nelayan'            => '2',
                'id_kategori'           => '3',
            ],
        ];

        foreach ($produk as $key => $value) {
            Produk::create($value);
        }
    }
}
