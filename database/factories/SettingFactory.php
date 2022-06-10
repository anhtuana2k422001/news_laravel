<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SettingFactory extends Factory
{
    public function definition()
    {
        return [
            'about_first_text'=> $this->faker->paragraph(),
            'about_second_text'=> $this->faker->paragraph(),
            'about_first_image'=> 'setting/about-img-1.jpg',
            'about_second_image'=> 'setting/about-img-2.jpg',
            'about_our_mission'=> $this->faker->paragraph(),
            'about_our_vision'=> $this->faker->paragraph(),
            'about_services'=> $this->faker->paragraph(),
        ];
    }
}
