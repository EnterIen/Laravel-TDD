<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Question;
use Tests\TestCase;

class QuestionsTest extends TestCase
{
	use RefreshDatabase;

  public function testUserCanViewQuestions()
  {
  	$this->withoutExceptionHandling();
    // 1.假设 /questions 路由存在
    // 2. 访问链接 /questions
		$test = $this->get('/questions');
		
    // 3. 正常返回 200
		$test->assertStatus(200);
  }

  public function testUserCanViewQuestionContent()
  {
  	// $this->withoutExceptionHandling();

  	$question = Question::factory()->create();
  	
    // 2. 访问链接 /questions
		$test = $this->get('/questions/' . $question->id);
		
    // 3. 正常返回 200
		$test->assertStatus(200)
		->assertSee($question->title)
		->assertSee($question->content)
		;
  }
}
