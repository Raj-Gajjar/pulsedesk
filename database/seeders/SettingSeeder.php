<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate([], [

            'app_name' => 'PulseDesk',

            'company_name' => 'PulseDesk',

            'timezone' => 'Asia/Kolkata',

            'survey_default_status' => 'draft',

            'allow_multiple_response' => true,

        ]);
    }
}
