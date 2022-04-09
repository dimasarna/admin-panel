<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['yes-or-no', 'multiple-choice'];

        return [
            'name' => $this->faker->paragraph(),
            'choice_1' => $this->faker->sentence(),
            'choice_2' => $this->faker->sentence(),
            'choice_3' => $this->faker->sentence(),
            'choice_4' => $this->faker->sentence(),
            'answer' => rand(1,4),
            'type' => $types[rand(0,1)],
        ];
    }
}
