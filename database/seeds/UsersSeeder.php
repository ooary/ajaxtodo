<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
        			['name'=>'john',
        			 'email'=>'john@mail.com',
        			 'password'=>bcrypt('john')],

        			['name'=>'jane',
        			 'email'=>'jane@mail.com',
        			 'password'=>bcrypt('jane')],
        		]);
        $this->command->info('users seeding success');
    }
}
