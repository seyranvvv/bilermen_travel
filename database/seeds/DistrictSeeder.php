<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        District::updateOrCreate([
            'name_tm' => 'Ashgabat shaheri',
        ]);
        District::updateOrCreate([
            'name_tm' => 'Dashoguz welayaty',
        ]);
    }
}
