<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BotsSeeder extends Seeder
{
    public function run(): void
    {
        // 10 white hat, 10 black hat
        foreach (range(1, 10) as $i) {
            DB::table('users')->insert([
                'username' => 'WhiteBot' . $i,
                'password' => bcrypt('botpass'),
                'phase' => 1,
                'money_clean' => rand(1000, 3000),
                'money_dirty' => 0,
                'crypto_legal' => rand(10, 100),
                'crypto_illegal' => 0,
                'ip_address' => '127.0.0.' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('users')->insert([
                'username' => 'BlackBot' . $i,
                'password' => bcrypt('botpass'),
                'phase' => 1,
                'money_clean' => 0,
                'money_dirty' => rand(1000, 3000),
                'crypto_legal' => 0,
                'crypto_illegal' => rand(10, 100),
                'ip_address' => '127.0.1.' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
