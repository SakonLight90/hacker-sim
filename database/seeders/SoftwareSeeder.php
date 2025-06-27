<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Software;

class SoftwareSeeder extends Seeder
{
    public function run(): void
    {
        $softwareTypes = [
            'sdk', 'spam', 'adware', 'firewall', 'antivirus', 'ip_spoofer', 'scanner'
        ];
        foreach (User::all() as $user) {
            foreach ($softwareTypes as $type) {
                Software::firstOrCreate([
                    'user_id' => $user->id,
                    'type' => $type,
                ], [
                    'level' => 1,
                ]);
            }
        }
    }
}
