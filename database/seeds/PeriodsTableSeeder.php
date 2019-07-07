<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('periods')->insert([
            'name' => 'Periode 2018/2019 Genap',
            'start_date' => '2019-01-01',
            'end_date' => '2019-08-08',
            'active' => 1,
        ]);

        DB::table('periods')->insert([
            'name' => 'Periode 2018/2019 Gasal',
            'start_date' => '2018-08-29',
            'end_date' => '2019-12-24',
            'active' => 0,
        ]);
    }
}
