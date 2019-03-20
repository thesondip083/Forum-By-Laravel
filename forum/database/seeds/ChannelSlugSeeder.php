<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1=['channel_name'=>'laravel','slug'=>str_slug('laravel')];
        $s2=['channel_name'=>'Pure Python','slug'=>str_slug('Pure Python')];
        $s3=['channel_name'=>'Vue JS','slug'=>str_slug('Vue JS')];
        $s4=['channel_name'=>'PHP 5.7','slug'=>str_slug('PHP 5.7')];
        $s5=['channel_name'=>'JavaScript','slug'=>str_slug('JavaScript')];

        

        Channel::create($s1);
        Channel::create($s2);
        Channel::create($s3);
        Channel::create($s4);
        Channel::create($s5);

       
    }
}
