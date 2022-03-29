<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostAnswersTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testPostAnswer()
  {
    // 学会用工厂生成假数据
    $question = Question::factory()->create();
    $user     = User::factory()->create();

    // 学会用 post 返回的是一个 response
    $response = $this->post("/questions/{$question->id}/answer", [
      'user_id' => $user->id,
      'content' => 'This is an answer.'
    ]);
    
    // 首先检查回答是否成功
    $response->assertStatus(200);

    // 检查回答内容是否存在
    $answer = $question->answers()->where('user_id', $user->id)->first();
    $this->assertNotNull($answer);
  }


}
