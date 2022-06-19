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

  /**
   * { 测试模型间关联关系 }
   */
  public function test_question_has_many_answer()
  {
    $question = Question::factory()->create();
    $answer = Answer::factory()->create(['question_id' => $question->id]);

    $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $question->answers());
  }

  /**
   * { 测试表单验证 }
   */
  public function test_form_request()
  {
    $this->expectException('Illuminate\Validation\ValidationException');  // 断言会产生什么异常

    $question = Question::factory()->create();

    $response = $this->post("questions/{$question->id}/answer", [
      'user_id' => User::factory()->create()->id,
      'content' => null,
    ]);
  }

  /**
   * @test
   */
  public function test_answer_question()
  {
    // 模拟登录
    $this->actingAs($user = User::factory()->create());

    $question = Question::factory()->create();

    $response = $this->post("questions/{$question->id}/answer", [
      // 'user_id' => User::factory()->create()->id,  // 用 auth()
      'content' => '回答问题',
    ]);

    $response->assertStatus(200);
  }

  /**
   * { 删除答案：权限问题 }
   */
  public function test_delete_question()
  {
    $this->withExceptionHandling();

    $this->signIn();

    $answer = Answer::factory()->create();

    // 1. 没有登陆时不可删除答案
    // $this->delete("/questions/answers/{$answer->id}")
    // ->assertRedirect('login');

    // 2. 登陆人必须是答案发布者，否则不可删除答案
    $this->delete("/questions/answers/{$answer->id}")
    ->assertStatus(403);      // [注意这里必须是数字哈]
  }

  public function test_question_answer_list()
  {
    $this->signIn();

    $question = create(Question::class);

    $answers =  create(Answer::class, ['question_id' => $question->id], 10);

    $response = $this->get("/questions/{$question->id}");

    // $result = $response->data('answers')->toArray();

    // dd($result);
  }

  public function test_helper_file()
  {
    dd(route_class());
  }
  
}
