<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MspTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<=10;$i++){
            DB::table('msp')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@qq.com',
            ]);
        }
    }
}
