<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Algeria' => 'DZ',
            'Angola' => 'AO',
            'Australia' => 'AU',
            'Korea' => 'KR'
        ];

        collect($countries)->each(function ($code, $name) {
            Country::create([
                'code' => $code,
                'name' => $name
            ]);
        });
    }
}
