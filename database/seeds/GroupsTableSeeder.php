<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'corp_id' => 1,
            'period_id' => 1,            
            'start_date' => '2019-06-17',
            'end_date' => '2019-07-12',
            'status' => 'created',
            'type' => 'kerja praktik',
        ]);

        DB::table('student_details')->insert([
            'student_id' => '4',
            'group_id' => '1',
            'accepted' => 1,            
        ]);

        DB::table('groups')->insert([
            'corp_id' => 1,
            'period_id' => 1,            
            'start_date' => '2019-06-24',
            'end_date' => '2019-07-26',
            'status' => 'created',     
            'type' => 'kerja praktik',       
        ]);

        DB::table('student_details')->insert([
            'student_id' => '2',
            'group_id' => '2',
            'accepted' => 1,            
        ]);

        DB::table('student_details')->insert([
            'student_id' => '3',
            'group_id' => '2',
            'accepted' => 1,            
        ]);
    }
}
