<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = array(
            array('type'=>'Training Session'),
            array('type'=>'Shelter Rehabilitation')
        );

        foreach($services as $service)
        {
            Service::updateOrCreate($service);
        }
    }
}
