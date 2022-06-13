<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

class AnswerTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

  public function test_question_has_many_answer()
  {
    $question = Question::factory()->create();
    $answer = Answer::factory()->create(['question_id' => $question->id]);

    $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $question->answers());
  }

  /**
   * @test
   */
  public function test_answer_question()
  {
    $question = Question::factory()->create();

    $response = $this->post("questions/{$question->id}/answer", [
      // 'user_id' => User::factory()->create()->id,  // 用 auth()
      'content' => '回答问题',
    ]);

    $response->assertStatus(200);
  }

  public function test_form_request()
  {
    $this->expectException('Illuminate\Validation\ValidationException');  // 断言会产生什么异常

    $question = Question::factory()->create();

    $response = $this->post("questions/{$question->id}/answer", [
      'user_id' => User::factory()->create()->id,
      'content' => null,
    ]);
  }
}
