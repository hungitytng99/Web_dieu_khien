<?php

use Illuminate\Database\Seeder;

class users extends Seeder
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
 
		'username' => 'admin',
		 
		'password' => '11091999',
		 
		'comment'=>'0'
		 
		]);
    }
}
