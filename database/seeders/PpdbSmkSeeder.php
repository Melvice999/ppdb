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

        // $faker = Faker::create();

        // for ($i = 1; $i <= 50; $i++) {
        //     // Generate unique nik
        //     $nik = $faker->unique()->numerify('############');

        //     // Generate tahun_daftar dan no_pendaftar
        //     $tahun_daftar = $faker->numberBetween(2020, 2024);
        //     $no_pendaftaran = $tahun_daftar . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);

        //     // Simpan data calon siswa ke tabel calon_siswa
        //     DB::table('calon_siswa')->insert([
        //         'nik'               => $nik,
        //         'nama'              => $faker->name,
        //         'tempat_lahir'      => $faker->city,
        //         'tanggal_lahir'     => $faker->date,
        //         'no_hp'             => $faker->phoneNumber,
        //         'desa'              => $faker->city,
        //         'rt'                => $faker->numerify('##'),
        //         'rw'                => $faker->numerify('##'),
        //         'provinsi'          => $faker->state,
        //         'kecamatan'         => $faker->city,
        //         'kabupaten'         => $faker->city,
        //         'jenis_kelamin'     => $faker->randomElement(['Laki-laki', 'Perempuan']),
        //         'kode_pos'          => $faker->numerify('#####'),
        //         'prodi'             => $faker->randomElement(['TBSM', 'TKRO', 'TKJ', 'AKL']),
        //         'wearpack/baju'     => $faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
        //         'asal_sekolah'      => $faker->company,
        //         'tahun_lulus'       => $faker->year,
        //         'nama_ayah'         => $faker->name('male'),
        //         'nama_ibu'          => $faker->name('female'),
        //         'no_hp_wali'        => $faker->phoneNumber,
        //         'pekerjaan_wali'    => $faker->jobTitle,
        //         'status'            => $faker->randomElement([1]),
        //         'created_at'        => now(),
        //         'updated_at'        => now(),
        //         'tahun_daftar'      => $tahun_daftar,
        //         'notifikasi_admin'  => $faker->randomElement(['Lulus Ujian'])
        //     ]);

        //     DB::table('no_pendaftaran')->insert([
        //         'nik'               => $nik,
        //         'no_pendaftaran'      => $no_pendaftaran,
        //         // Tambahkan atribut lain sesuai kebutuhan
        //     ]);
        // }

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
            'fb'            => 'SKEMANDOR.OFFICIAL',
            'yt'            => 'SkemandorTV',
            'web'           => 'www.smkmaarifnudoro.sch.id',
            'map'           => 'Jl. Raya Doro-Jolotigo, Doro, Kec. Doro, Kab. Pekalongan Prov. Jawa Tengah',
            'link_map'      => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15839.26412390808!2d109.6897945!3d-7.0308979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7018ea59978517%3A0x39a4f7ba92c82aa0!2sSMK%20MAARIF%20NU%20DORO!5e0!3m2!1sid!2sid!4v1710659056399!5m2!1sid!2sid',
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
