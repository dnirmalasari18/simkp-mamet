<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'koordinator',
            'fullname' => 'Koordinator KP',
            'phone_number' => '0812938483',
            'role' => 'koordinator',
            'password' => bcrypt('koordinator'),
        ]);

        DB::table('users')->insert([
            'username' => '05111640000129',
            'fullname' => 'Fran',
            'phone_number' => '0812938483',
            'role' => 'mahasiswa',
            'password' => bcrypt('fran'),
        ]);        

        DB::table('users')->insert([
            'username' => '05111640000115',
            'fullname' => 'Mala',
            'phone_number' => '0812938483',
            'role' => 'mahasiswa',
            'password' => bcrypt('mala'),
        ]);

        DB::table('users')->insert([
            'username' => '05111640000096',
            'fullname' => 'Jason',
            'phone_number' => '0812938483',
            'role' => 'mahasiswa',
            'password' => bcrypt('jason'),
        ]);
        
        DB::table('users')->insert([
            'username' => 'ramialeon',
            'fullname' => 'Ramialeon',
            'phone_number' => '0812938483',
            'role' => 'pembimbing',
            'password' => bcrypt('ramialeon'),
        ]);
    }
}
