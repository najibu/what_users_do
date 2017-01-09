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
        DB::table('statuses')->insert([
            'code' => 'AP',
            'description' => 'Awaiting review panel'
        ]);
        DB::table('statuses')->insert([
            'code' => 'OR',
            'description' => 'Panel opinion rendered'
        ]);
        DB::table('statuses')->insert([
            'code' => 'SF',
            'description' => 'Suit filed'
        ]);
        DB::table('statuses')->insert([
            'code' => 'CL',
            'description' => 'Closed'
        ]);
    }
}
