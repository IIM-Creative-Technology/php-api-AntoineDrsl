<?php

namespace Database\Factories;

use App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $student = DB::table('students')->select('id')->inRandomOrder()->limit(1)->get();
        $subject = DB::table('subjects')->select('id')->inRandomOrder()->limit(1)->get();

        return [
            'student_id' => $student[0]->id,
            'subject_id' => $subject[0]->id,
            'value' => $this->faker->numberBetween(0, 20)
        ];
    }
}
