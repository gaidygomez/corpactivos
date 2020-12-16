<?php

use Illuminate\Database\Seeder;

class ColombianBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\ColombianBank::class, 10)->create();
    }
}
