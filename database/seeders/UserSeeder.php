<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'          => 'Tiara Rahmania',
                'email'         => 'tiara@user.com',
                'password'      => bcrypt('12345'),
                'telepon'       => '0812456782',
                'alamat'        => 'surabaya',
                'provinsi'      => 'jawa timur',
                'kotakab'       => 'sidoarjo',
                'kecamatan'     => 'sidoarjo',
                'desa'          => 'suko',
                'foto'          => 'User.png',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
