<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'provider_name' => 'Sid',
            'provider_address' => 'Sid',
            'provider_experience' => 5,
            'provider_gender' => 'M',
            'provider_email' => 'sid@bsdk.com',
            'provider_number' => 668895,
            'provider_password' => 'sid@1234',
            'provider_service' => 'NULLABLE',
        ]);
    }
}
