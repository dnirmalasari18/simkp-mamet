<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Bimbingan 1',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Bimbingan 2',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Laporan Mingguan 1',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Laporan Mingguan 2',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Laporan Mingguan 3',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Laporan Mingguan 4',
        ]);

        DB::table('reports')->insert([
            'group_id' => '2',
            'title' => 'Laporan Mingguan 5',
        ]);
    }
}
