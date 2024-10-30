<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    // Link the factory to the Student model
    protected $model = Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'birth_date' => $this->faker->date(),
            'city_id' => $this->faker->numberBetween(4, 15), // Assuming cities from ID 4 to 15 exist
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}