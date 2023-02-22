<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinTopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['coin' => 50, 'price' => 50000],
            ['coin' => 100, 'price' => 98000],
            ['coin' => 350, 'price' => 340000],
            ['coin' => 500, 'price' => 470000],
            ['coin' => 1200, 'price' => 110000],
        ];

        DB::table('topups')->insert($data);
    }
}
