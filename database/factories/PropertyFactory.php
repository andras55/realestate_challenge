<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $ret = $faker->randomElement(['house', 'departament', 'land', 'commercial_ground']);
        $st = $faker->streetName();
        $en = $faker->buildingNumber();
        $in = ($ret == 'departament' || $ret == 'commercial_ground') ? $faker->bothify() : '';
        $nbh = $faker->words(1, true);
        $city = $faker->city();
        $country = $faker->countryCode();
        $r = $faker->numberBetween(2, 8);
        $br = $faker->randomElement([0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4]);
        $comments = $faker->text(100);
        $name = str_replace('_', ' ', (ucfirst($ret) . ' ' . $en . ' ' . $st));

        return [
            'name' => $name, 
            'real_estate_type' => $ret, 
            'street' => $st, 
            'external_number' => $en, 
            'internal_number' =>  $in, 
            'neighborhood' => $nbh, 
            'city' => $city, 
            'country' => $country, 
            'rooms' => $r, 
            'bathrooms' => $br, 
            'comments' => $comments
        ];
    }
}
