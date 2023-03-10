<?php
  
use Illuminate\Database\Seeder;
use App\Country;
use App\State;
use App\City;
   
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::create([
            'title' => 'Pakistan',
            'countryCode' => '92',
            
        ]);
            $state = State::create([
                'country_id' => $country->id,
                'title' => 'Capital',

            ]);
                $city = City::create([
                    'state_id' => $state->id,
                    'title' => 'Islamabad',
                ]);

            $state = State::create([
                'country_id' => $country->id,
                'title' => 'Punjab',
            ]);
                $city = City::create([
                    'state_id' => $state->id,
                    'title' => 'Rawalpindi',
                ]);

            $state = State::create([
                'country_id' => $country->id,
                'title' => 'Sindth',
            ]);
                $city = City::create([
                    'state_id' => $state->id,
                    'title' => 'Karachi',
                ]);
                
        $country = Country::create([
            'title' => 'Saudi Arabia',
            'countryCode' => '966',
            
        ]);

        $country = Country::create([
            'title' => 'USA',
            'countryCode' => '1',
            
        ]);

        $country = Country::create([
            'title' => 'UK',
            'countryCode' => '44',
            
        ]);
    }
}



