<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PpdbSmkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('calon_siswa')->insert([
                'nik'               => $faker->unique()->numerify('############'),
                'kk'                => $faker->numerify('##################'),
                'nama'              => $faker->name,
                'tempat_lahir'      => $faker->city,
                'tanggal_lahir'     => $faker->date,
                'no_hp'             => $faker->phoneNumber,
                'desa'              => $faker->city,
                'rt'                => $faker->numerify('##'),
                'rw'                => $faker->numerify('##'),
                'provinsi'          => $faker->state,
                'kecamatan'         => $faker->city,
                'kabupaten'         => $faker->city,
                'jenis_kelamin'     => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'warga_negara'      => $faker->randomElement(['WNI', 'WNA']),
                'kode_pos'          => $faker->numerify('#####'),
                'prodi'             => $faker->randomElement(['TBSM', 'TKRO', 'TKJ', 'AKL']),
                'batik'             => $faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
                'olahraga'          => $faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
                'wearpack'          => $faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
                'asal_sekolah'      => $faker->company,
                'tahun_lulus'       => $faker->year,
                'nama_ayah'         => $faker->name('male'),
                'nama_ibu'          => $faker->name('female'),
                'no_hp_wali'        => $faker->phoneNumber,
                'desa_wali'         => $faker->city,
                'rt_wali'           => $faker->numerify('##'),
                'rw_wali'           => $faker->numerify('##'),
                'provinsi_wali'     => $faker->state,
                'kecamatan_wali'    => $faker->city,
                'kabupaten_wali'    => $faker->city,
                'kode_pos_wali'     => $faker->numerify('#####'),
                'pekerjaan_wali'    => $faker->jobTitle,
                'pendidikan_wali'   => $faker->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
                'info_sekolah'      => $faker->text,
                'status'            => $faker->randomElement([0, 1]),
                'created_at'        => now(),
                'updated_at'        => now(),
                'tahun_daftar'      => $faker->numberBetween(2020, 2024),
            ]);
        }
        DB::table('pengaturan')->insert([
            'pendaftaran'   => 0,
            'hasil_seleksi' => 0,
            'j_informasi'   => 'Halaman Informasi',
            'informasi'     => 'Tidak ada informasi',
            'wa'            => 0,
            'ig'            => 0,
            'fb'            => 0,
            'yt'            => 0,
            'web'           => 0,
            'map'           => 0,
        ]);
        DB::table('beranda')->insert([
            ['judul' => 'Beranda SMK 1', 'konten' => 'Isi Beranda SMK 1'],
            ['judul' => 'Beranda SMK 2', 'konten' => 'Isi Beranda SMK 2'],
        ]);
        DB::table('admin')->insert([
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => 'admin',
        ]);
        DB::table('headmaster')->insert([
            'username'  => 'headmaster',
            'email'     => 'headmaster@gmail.com',
            'password'  => 'headmaster',
        ]);
    }
}
