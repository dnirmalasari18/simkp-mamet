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
            'username' => '5116100129',
            'fullname' => 'Frandita Adhitama',
            'phone_number' => '082159688234',
            'role' => 'mahasiswa',
            'password' => bcrypt('lala'),
        ]);

        DB::table('users')->insert([
            'username' => '5116100115',
            'fullname' => 'Dewi Ayu Nirmalasari',
            'phone_number' => '0812938483',
            'role' => 'mahasiswa',
            'password' => bcrypt('lala'),
        ]);

        DB::table('users')->insert([
            'username' => '5116100096',
            'fullname' => 'Jason Wilyandi',
            'phone_number' => '0812938483',
            'role' => 'mahasiswa',
            'password' => bcrypt('lala'),
        ]);

        // DB::table('users')->insert([
        //     'username' => 'ramialeon',
        //     'fullname' => 'Ramialeon Swindarno',
        //     'phone_number' => '0812938483',
        //     'role' => 'dosen',
        //     'password' => bcrypt('ramialeon'),
        // ]);
    }
}
