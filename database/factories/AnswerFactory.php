<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Question;
use App\Models\User;
use App\Models\Answer;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'question_id' => function () {
                return Question::factory()->create()->id;
            },
            'content' => $this->faker->text,
        ];
    }
}
