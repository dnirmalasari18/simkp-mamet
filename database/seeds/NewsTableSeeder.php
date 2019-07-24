<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert([
            'title' => 'Form Kerja Praktik',
            'description' => 'Terlampir Form Kerja Praktik sebagai berikut: - Form Pengajuan KP - Form Penilaian Dosen - Form Penilaian Perusahaan',            
        ]);

        DB::table('news')->insert([
            'title' => 'Silde Alur dan Prosedur KP',
            'description' => 'Penjelasan tentang aturan dan alur Kerja Praktik',            
        ]);
    }
}
