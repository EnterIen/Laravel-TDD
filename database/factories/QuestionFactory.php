<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Question;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
  protected $model = Question::class;

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
      'title'   => $this->faker->sentence,
      'content' => $this->faker->text,
    ];
  }
}
