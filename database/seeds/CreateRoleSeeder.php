<?php

use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
	    ['name'=>'admin','diplay_name'=>'quản tri he thong'],
	    ['name'=>'guest','diplay_name'=>'khach hang'],
	    ['name'=>'developer','diplay_name'=>'phat trien he thong'],
	    ['name'=>'content','diplay_name'=>'tao bai viet'],

        ]);
    }
}
