<?php

use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('claims')->insert([
            'patient' => 'Smith'
        ]);
        DB::table('claims')->insert([
            'patient' => 'Jones'
        ]);
        DB::table('claims')->insert([
            'patient' => 'Brown'
        ]);
    }
}
