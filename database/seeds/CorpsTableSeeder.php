<?php

use Illuminate\Database\Seeder;

class CorpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('corps')->insert([
            'name' => 'Jurusan Teknik Material dan Metalurgi ITS',
            'address' => 'Keputih, Sukolilo, Kota SBY, Jawa Timur',
            'city' => 'Surabaya',
            'post' => '60111',
            'phone_number' => '(031) 5997026',
            'type' => 'Pendidikan',
            'profile' => '-',
        ]);

        DB::table('corps')->insert([
            'name' => 'PT Garuda Maintenance Facility AeroAsia - Jakarta',
            'address' => 'Soekarno Hatta International Airport',
            'city' => 'Jakarta',
            'post' => '15126',
            'phone_number' => '+62 21 550 8717 ',
            'type' => 'Penerbangan',
            'profile' => 'PT GMF AeroAsia adalah perusahaan internasional yang mempekerjakan sekitar 2,500 karyawan yang berbasis di Jakarta, Indonesia.[1][4] Perusahaan ini memberikan layanan pesawat dari berbagai jenis dan merupakan salah satu fasilitas perawatan pesawat terbesar',
        ]);

        DB::table('corps')->insert([
            'name' => 'Bank Jatim Cabang Utama Surabaya',
            'address' => 'Jl. Basuki Rachmat No. 98-104',
            'city' => 'Surabaya',
            'post' => '60271',
            'phone_number' => '031 5310090-99',
            'type' => 'Bank',
            'profile' => 'PT Bank Pembangunan Daerah Jawa Timur Tbk (“Bank Jatim”) didirikan dengan nama PT Bank Pembangunan Daerah Djawa Timur pada tanggal 17 Agustus 1961 dengan akta yang dibuat oleh Notaris Anwar Mahajudin, No. 91 tanggal 17 Agustus 1961. Dengan adanya Undang-Undang',
        ]);
    }
}
