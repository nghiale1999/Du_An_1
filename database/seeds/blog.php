<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class blog extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            ['tieude'=>'tieude1','hinh'=>'hinh1','noidung'=>'noi dung 1 noi dung 1 noi dung 1'],
            ['tieude'=>'tieude2','hinh'=>'hinh2','noidung'=>'noi dung 1 noi dung 1 noi dung 1'],
            ['tieude'=>'tieude3','hinh'=>'hinh3','noidung'=>'noi dung 1 noi dung 1 noi dung 1'],
            ['tieude'=>'tieude4','hinh'=>'hinh4','noidung'=>'noi dung 1 noi dung 1 noi dung 1'],
        ]);
    }
}
