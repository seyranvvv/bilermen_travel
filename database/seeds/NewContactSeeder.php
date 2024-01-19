<?php

use Illuminate\Database\Seeder;

class NewContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(

            [
                '+99364019344',
                '+99312342191',
                'syyyahat@aydyngijeler.com',
                'Aşgabat şäheri, Köpetdag etraby, 1958-nji (Andalyp) köçesi, 40-njy jaý',
                '',
                '',
                'Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt.',
                '',
                '',
                'travel',
            ],
            [
                '+99363796666',
                '',
                'syyyahat@aydyngijeler.com',
                'Aşgabat şäheri, Köpetdag etraby, 1958-nji (Andalyp) köçesi, 40-njy jaý',
                '',
                '',
                'Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt.',
                '',
                '',
                'advertisement',
            ],
            [
                '+99363796666',
                '',
                'syyyahat@aydyngijeler.com',
                'Aşgabat şäheri, Köpetdag etraby, 1958-nji (Andalyp) köçesi, 40-njy jaý',
                '',
                '',
                'Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt.',
                '',
                '',
                'logistics',
            ],
            [
                '+99363796666',
                '',
                'syyyahat@aydyngijeler.com',
                'Aşgabat şäheri, Köpetdag etraby, 1958-nji (Andalyp) köçesi, 40-njy jaý',
                '',
                '',
                'Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt.',
                '',
                '',
                'it',
            ],
        );
        foreach ($objects as $object) {
            $obj = new App\Contact();
            $obj->phone = $object[0];
            $obj->phone1 = $object[1];
            $obj->email = $object[2];
            $obj->adress_tm = $object[3];
            $obj->adress_ru = $object[4];
            $obj->adress_en = $object[5];
            $obj->slogan_tm = $object[6];
            $obj->slogan_ru = $object[7];
            $obj->slogan_en = $object[8];
            $obj->type = $object[9];
            $obj->save();
        }
    }
}
