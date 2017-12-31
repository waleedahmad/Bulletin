<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Config::truncate();

        $configurations = [
            [
                'name'  =>  'background_color',
                'value' =>  '#36465d'
            ]
        ];

        foreach($configurations as $config){
            $c = new \App\Config();
            $c->name = $config['name'];
            $c->value = $config['value'];
            $c->save();
        }

        echo 'Config seeded';
    }
}
