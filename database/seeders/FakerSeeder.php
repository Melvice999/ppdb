<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            // Generate unique nik
            $nik = $faker->unique()->numerify('3###############');

            // Insert data into calon_siswa table
            DB::table('calon_siswa')->insert([
                'nik' => $nik,
                'no_pendaftaran' => $faker->unique()->regexify('[A-Z0-9]{10}'),
                'password' => bcrypt('password'), // default password is 'password'
                'nama' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date,
                'no_hp' => $faker->phoneNumber,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'rt' => $faker->numberBetween(1, 99),
                'rw' => $faker->numberBetween(1, 99),
                'provinsi' => $faker->state,
                'kecamatan' => $faker->citySuffix,
                'kabupaten' => $faker->city,
                'desa' => $faker->city,
                'kode_pos' => $faker->postcode,
                'status' => 1,
                'notifikasi_admin' => 'Pendaftaran Selesai',
                'created_at' => now(),
                'updated_at' => now(),
                'tahun_daftar' => $faker->randomElement(['2021', '2022', '2023', '2024']),
            ]);

            // Insert data into otp table
            DB::table('otp')->insert([
                'nik' => $nik,
                'otp' => $faker->numerify('#####'),
                'waktu' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert data into detail_calon_siswa table
            DB::table('detail_calon_siswa')->insert([
                'nik' => $nik,
                'pas_foto' => 'path/to/pas_foto', // path to pas_foto file
                'jalur_pendaftaran' => $faker->randomElement(['Reguler', 'Prestasi']),
                'prodi' => $faker->randomElement(['TBSM', 'TKRO', 'TKJ', 'AKL']),
                'wearpack' => $faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
                'asal_sekolah' => $faker->company,
                'tahun_lulus' => $faker->numberBetween(2000, 2023),
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'no_hp_wali' => $faker->phoneNumber,
                'pekerjaan_wali' => $faker->jobTitle,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

              // Insert data into otp table
              DB::table('otp')->insert([
                'nik' => $nik,
                'otp' => $faker->numerify('#####'),
                'waktu' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('penilaian')->insert([
                'nik' => $nik,
            ]);
        }
    }
}
