<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'title' => $this->faker->sentence,
            'content' => $this->faker->text
        ];
    }

    public function published()
    {
      return $this->state(function (array $attributes) {
        return [
            'published_at' => Carbon::now()
        ];
      });
    }

    public function unpublished()
    {
      return $this->state(function (array $attributes) {
        return [
            'published_at' => NULL
        ];
      });
    }
}