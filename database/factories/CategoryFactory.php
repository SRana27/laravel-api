<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
<<<<<<< HEAD
    {  $Catname= $this->faker->text('10');
        return [
         'name'=>$Catname,
            'slug'=>Str::slug($Catname)
=======
    {  $CategoryName= $this->faker->text('10');
        return [
             'name'=>$CategoryName,
             'slug'=>Str::slug($CategoryName)
>>>>>>> 66a1a1c318e5be4068f2f7211baa4296f9198c83
        ];
    }
}
