<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = [
            ['name' => 'Australia'],
            ['name' => 'Austria'],
            ['name' => 'Azerbaijan'],
            ['name' => 'Bahamas'],
            ['name' => 'Bahrain'],
            ['name' => 'Bangladesh'],
            ['name' => 'Belize'],
            ['name' => 'Benin'],
            ['name' => 'Bermuda'],
            ['name' => 'Bhutan'],

            ['name' => 'Burundi'],
            ['name' => 'Cambodia'],
            ['name' => 'Cameroon'],
            ['name' => 'Canada'],
            ['name' => 'Chad'],
            ['name' => 'Chile'],
            ['name' => 'China'],
            ['name' => 'Guyana'],
            ['name' => 'Hong Kong'],
            ['name' => 'Iceland'],
            ['name' => 'India'],
            ['name' => 'Indonesia'],
            ['name' => 'Iraq'],
            ['name' => 'Palau'],
            ['name' => 'Panama'],
            ['name' => 'Philippines'],
            ['name' => 'Pitcairn'],
            ['name' => 'Poland'],
            ['name' => 'Portugal'],
            ['name' => 'Puerto Rico'],
            ['name' => 'Qatar'],
            ['name' => 'Réunion'],
            ['name' => 'Romania'],
            ['name' => 'Russian'],
            ['name' => 'Rwanda'],
            ['name' => 'Senegal'],
            ['name' => 'Serbia'],
            ['name' => 'Seychelles'],
            ['name' => 'Sierra Leone'],
            ['name' => 'Singapore'],
            ['name' => 'Slovakia'],
            ['name' => 'Slovenia'],
            ['name' => 'Solomon Islands'],
            ['name' => 'Somalia'],
            ['name' => 'South Africa'],
            ['name' => 'South Sudan'],
            ['name' => 'Spain'],
            ['name' => 'Sri Lanka'],
            ['name' => 'Sudan'],
            ['name' => 'Suriname'],
            ['name' => 'Svalbard and Jan Mayen'],
            ['name' => 'Swaziland'],
            ['name' => 'Sweden'],
            ['name' => 'Switzerland'],
            ['name' => 'Syrian Arab Republic'],
            ['name' => 'Taiwan'],
            ['name' => 'Tajikistan'],
            ['name' => 'Tonga'],
            ['name' => 'Trinidad and Tobago'],
            ['name' => 'Tunisia'],
            ['name' => 'Turkey'],
            ['name' => 'Turkmenistan'],
            ['name' => 'Turks and Caicos Islands'],
            ['name' => 'Tuvalu'],
            ['name' => 'Uganda'],
            ['name' => 'Ukraine'],
            ['name' => 'United Arab Emirates'],
            ['name' => 'United Kingdom'],
        ];

        foreach ($countries as $key => $value) {
            Country::create($value);
        }
    }
}
