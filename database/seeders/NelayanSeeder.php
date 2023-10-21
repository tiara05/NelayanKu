<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Nelayan;

class NelayanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nelayan = [
            [
                'name'          => 'Budiman',
                'username'          => 'Budiman',
                'email'         => 'budiman@gmail.com',
                'password'      => 'budiman12345',
                'nomortelepon'       => '0812456782',
                'alamat'        => 'Jl. Telekomunikasi No 8',
                'provinsi'      => 'JAWA BARAT',
                'kotakab'       => 'KABUPATEN BANDUNG',
                'kecamatan'     => 'BOJONGSOANG',
                'desa'          => 'BOJONGSOANG',
                'foto'          => '7.png',
            ],
            [
                'name'          => 'Susanto',
                'username'          => 'Susanto',
                'email'         => 'susanto@gmail.com',
                'password'      => 'susanto12345',
                'nomortelepon'       => '08123583021',
                'alamat'        => 'Jl. Mawar No 8',
                'provinsi'      => 'JAWA TIMUR',
                'kotakab'       => 'KABUPATEN MALANG',
                'kecamatan'     => 'KEPANJEN',
                'desa'          => 'KEPANJEN',
                'foto'          => '7.png',
            ]
        ];

        foreach ($nelayan as $key => $value) {
            Nelayan::create($value);
        }
    }
}
