<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_status')->insert([
        	'status_code' => 0,
        	'status_value' => 'Unpublish'
        ]);

        DB::table('tbl_status')->insert([
        	'status_code' => 1,
        	'status_value' => 'Publish'
        ]);

        DB::table('tbl_status')->insert([
        	'status_code' => 2,
        	'status_value' => 'Deleted'
        ]);
    }
}
