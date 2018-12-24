<?php

use Illuminate\Database\Seeder;

class Init extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$group = \App\Group::create(['name' => 'Administrators']);
    	\App\Group::create(['name' => 'Voters']);


    	$user = new \App\User;
    	$user->group_id = $group->id;;
    	$user->name = 'Super Admin';
    	$user->email = 'lmndarboe@gmail.com';
    	$user->password = \Hash::make('123');
    	$user->save();


    }
}
