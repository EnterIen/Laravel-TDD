<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
  /**
   * { 测试要点 }
   * 
   * 1. 测试一定要有一个预期结果
   * 2. 测试数据？测试前提？
   * 3. assertStatus 是检查 Http 请求状态
   * 4. $this->withoutExceptionHandling() 不渲染异常
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
}
