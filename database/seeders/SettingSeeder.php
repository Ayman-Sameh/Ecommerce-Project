<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['name'       =>'name' ,
                         'description'=>'Type any description' ,
                         'email'      =>'email@email.com' ,
                         'logo'       =>'2022-09-26_logo_black.png' ,
                         'phone'      =>'01273352186' ,
                         'whatsapp'   =>'01273352186' ,
                         'instagram'  =>'https://www.instagram.com/' ,
                         'facebook'   =>'https://web.facebook.com/' ,
                         'twitter'    =>'https://twitter.com/' ,
                         'youtube'    =>'https://www.youtube.com/' 
                         ]);
    }
}
