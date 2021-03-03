<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classe = DB::table('classes')->select('id')->inRandomOrder()->limit(1)->get();
        $teacher = DB::table('teachers')->select('id')->inRandomOrder()->limit(1)->get();

        $start = $this->faker->dateTimeThisMonth()->format('Y-m-d');
        $end = date('Y-m-d', strtotime($start . ' +' . $this->faker->numberBetween(2, 5) . ' days'));

        return [
            'classe_id' => $classe[0]->id,
            'teacher_id' => $teacher[0]->id,
            'name' => $this->faker->sentence(2),
            'start' => $start,
            'end' => $end
        ];
    }
}
