<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'setting_name' => 'about_title',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet about'
        ]);

        DB::table('settings')->insert([
            'setting_name' => 'history',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet history'
        ]);

        DB::table('settings')->insert([
            'setting_name' => 'choose',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet choose'
        ]);

        DB::table('settings')->insert([
            'setting_name' => 'testimonial',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet choose testimonial'
        ]);
        
        DB::table('settings')->insert([
            'setting_name' => 'contact_title',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet choose contact Title'
        ]);

        DB::table('settings')->insert([
            'setting_name' => 'contact_des',
            'setting_value' => 'Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet choose contact Description'
        ]);


    }
}
