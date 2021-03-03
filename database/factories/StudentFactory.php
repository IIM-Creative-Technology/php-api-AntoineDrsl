<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classe = DB::table('classes')->select(['id', 'graduation_year'])->inRandomOrder()->limit(1)->get();

        return [
            'classe_id' => $classe[0]->id,
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(18, 25),
            'entry_year' => date('Y', strtotime($classe[0]->graduation_year . '-01-01 -5 years'))
        ];
    }
}
