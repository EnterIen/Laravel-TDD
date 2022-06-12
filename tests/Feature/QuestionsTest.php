<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Question;

class QuestionsTest extends TestCase
{
  use RefreshDatabase;

  /**
   * { 测试要点 }
   * 
   * 1. 测试一定要有一个预期结果
   * 2. 测试数据？测试前提？
   * 3. assertStatus 是检查 Http 请求状态
   * 4. $this->withoutExceptionHandling() 不渲染异常
   * 5. @test 的方式更值得推荐
   * 6. 可以运行全部测试、指定目录下测试(路径)、指定文件下测试(路径)、指定单个测试(--filter)
   * 7. 开始引入测试数据：学会使用工厂、seeder
   * 8. 测试数据的隔离性：RefreshDatabase
   * 
   */


  /**
   * 问题列表
   *
   * @return void
   */
  public function testQuestions()
  {
    $this->withoutExceptionHandling();

    $response = $this->get('questions');


    // 测试一定要有一个预期结果
    $response->assertStatus(200);
  }

  /**
   * @test
   */
  public function test_question_list()
  {
    $this->withoutExceptionHandling();

    $response = $this->get('questions');


    // 测试一定要有一个预期结果
    $response->assertStatus(200);
  }

  /**
   * @test
   */
  public function test_question_detail()
  {
    $question = Question::factory()->create();

    $response =  $this->get('questions/' . $question->id);

    $response->assertStatus(200);
  }
}
