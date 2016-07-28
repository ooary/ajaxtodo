<?php

use Illuminate\Database\Seeder;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('todolists')->truncate();
        $todolists = [];

        for($i=0;$i<=10;$i++)
        	:
        $todolists[]= [
        				'title'=>'Todolists '. $i,
        				'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quos veritatis ad maiores consectetur vel, quas facilis provident tempore autem ab sed asperiores, ipsa error ipsum, optio neque alias quod.',
        				'user_id'=>rand(1,2)
          			  ];
        endfor;
        DB::table('todolists')->insert($todolists);
        $this->command->info('Seeding Dummy Todolists Success');
    }
}
	