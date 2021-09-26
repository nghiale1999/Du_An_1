<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class country extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
            ['name'=>'vietnam'],
            ['name'=>'hanquoc'],
            ['name'=>'phap'],
            ['name'=>'thuysy'],
        ]);
    }
}
