<?php

use Illuminate\Database\Seeder;

class CompanieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Company::class, 10)->create();
    }
}
