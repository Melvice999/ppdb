<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
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
            'pendaftaran'   => 1,
            'hasil_seleksi' => 0,
            'j_informasi'   => 'Informasi Pendaftaran',
            'informasi'     => '<div id="" class="Text_Text__v_8Om Text_Text_center__40OcD">
            <p><strong>SYARAT PENDAFTARAN</strong></p>
            <ol>
            <li>Foto copy akta kelahiran 2 lembar&nbsp;</li>
            <li>Foto copy keluarga (kk) 2 lembar</li>
            <li>Pas foto 3 x 4 berwarna 2 lembar</li>
            <li>Foto copy transkip nilai /SHUN&nbsp;</li>
            <li>Ijazan 2 lembar (jika sudah ada)</li>
            <li>Persyaratan pendaftar dimasukan ke dalam stopmap</li>
            </ol>
            <p><strong>PRESTASI AKADEMIK</strong></p>
            <ul>
            <li>Peringkat kelas Semester 1-5 gratis SPP bulan</li>
            </ul>
            <p><strong>PRESTASI NON AKADEMIK</strong></p>
            <ul>
            <li>Juara tingkat nasional peringkat I s.d III Gratis SPP 12 Bulan</li>
            <li>Juara tingkat provinsi peringkat I s.d III Gratis SPP 4 Bulan</li>
            <li>Juara tingkat kabupaten peringkat I s.d III Gratis SPP 2 Bulan</li>
            <li>Hafal juz 30 Gratis SPP 2 Bulan</li>
            </ul>
            </div>',
            'wa'            => '082225379187',
            'ig'            => 'smkmaarifdoro',
            'fb'            => 'SMK Ma\'arif NU Doro',
            'yt'            => 'Skemandor TV',
            'web'           => 'www.smkmaarifnudoro.sch.id',
            'map'           => 'Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab. Pekalongan Prov. Jawa Tengah',
        ]);
        DB::table('beranda')->insert([
            [
                'judul' => 'SMK Ma\'arif NU Doro',
                'konten' => '<div id="some_id" class="Text_Text__v_8Om Text_Text_center__40OcD">
                    <p>SMK Ma&rsquo;arif NU Doro merupakan lembaga pendidikan dibawah naungan LP Ma&rsquo;arif NU, Untuk membentuk peserta didik menjadi sumber daya manusia yang terampil, kreatif dan inovatif dengan berkarakter pekerja keras, tanggung jawab, memiliki semangat kebangsaan dan cinta tanah air, peduli terhadap lingkungan sosial, santun serta beraklakul karimah.</p>
                    <p>Visi SMK Ma\'arif NU Doro Yaitu</p>
                    <p><strong>ManTAB</strong></p>
                    <p>(<strong>Man</strong>diri, <strong>T</strong>erampil, <strong>A</strong>gamis dan <strong>B</strong>erakhlakul Karimah)</p>
                </div>',
            ],
            [
                'judul' => 'Informasi Pendaftaran',
                'konten' => '<div id="" class="Text_Text__v_8Om Text_Text_center__40OcD">
                <p><strong>SYARAT PENDAFTARAN</strong></p>
                <ol>
                <li>Foto copy akta kelahiran 2 lembar&nbsp;</li>
                <li>Foto copy keluarga (kk) 2 lembar</li>
                <li>Pas foto 3 x 4 berwarna 2 lembar</li>
                <li>Foto copy transkip nilai /SHUN&nbsp;</li>
                <li>Ijazan 2 lembar (jika sudah ada)</li>
                <li>Persyaratan pendaftar dimasukan ke dalam stopmap</li>
                </ol>
                <p><strong>PRESTASI AKADEMIK</strong></p>
                <ul>
                <li>Peringkat kelas Semester 1-5 gratis SPP bulan</li>
                </ul>
                <p><strong>PRESTASI NON AKADEMIK</strong></p>
                <ul>
                <li>Juara tingkat nasional peringkat I s.d III Gratis SPP 12 Bulan</li>
                <li>Juara tingkat provinsi peringkat I s.d III Gratis SPP 4 Bulan</li>
                <li>Juara tingkat kabupaten peringkat I s.d III Gratis SPP 2 Bulan</li>
                <li>Hafal juz 30 Gratis SPP 2 Bulan</li>
                </ul>
                </div>',
            ],
        ]);

        $adminPassword = Hash::make('admin');
        DB::table('admin')->insert([
            'email'     => 'admin@gmail.com',
            'password'  => $adminPassword,
        ]);

        $headmasterPassword = Hash::make('headmaster');
        DB::table('headmaster')->insert([
            'email'     => 'headmaster@gmail.com',
            'password'  => $headmasterPassword
        ]);
    }
}
