<?php

use Illuminate\Database\Seeder;

class BasketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('baskets')->insert([
            'created_at' => new DateTime(),
            'updated_at' => null,
        ]);
    }
}
