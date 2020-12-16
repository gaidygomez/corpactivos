<?php

use Illuminate\Database\Seeder;

class BankEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\BankEntity::class, 25)->create();
    }
}
