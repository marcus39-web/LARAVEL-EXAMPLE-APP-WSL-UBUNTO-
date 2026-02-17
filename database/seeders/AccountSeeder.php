<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Account::create([
                'owner_name' => 'User ' . $i,
                'balance' => rand(100, 10000) / 100,
            ]);
        }
    }
}
