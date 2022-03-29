<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Question;
use Tests\TestCase;
use Carbon\Carbon;

class QuestionsTest extends TestCase
{
	use RefreshDatabase;

  public function testUserCanViewQuestions()
  {
    // 2. 访问链接 /questions
		$response = $this->get('/questions');
		
    // 3. 正常返回 200
		$response->assertStatus(200);
  }

  public function testUserCanViewQuestionContent()
  {
  	$question = Question::factory()->create(['published_at' => Carbon::now()]);
  	
    // 2. 访问链接 /questions
		$response = $this->get('/questions/' . $question->id);
		
    // 3. 正常返回 200
		$response->assertStatus(200);

    // 4. 检查内容
    $this->assertNotNull($question->content);
  }

  /** @test */
  public function user_can_view_published_question()
  {
    $question = Question::factory()->create(['published_at' => Carbon::parse('-1 week')]);

    $this->get('/questions/' . $question->id)
    ->assertStatus(200)
    ->assertSee($question->title)
    ->assertSee($question->content);
  }

  /** @test */
  public function user_cannot_view_unpublished_question()
  {
    $question = Question::factory()->create(['published_at' => null]);

    $this->withExceptionHandling()            // 这里需要渲染异常
    ->get('/questions/' . $question->id)
    ->assertStatus(404)
    ;
  }

  /**
   * @test
   */
  public function rebuild()
  {
    /**
     * { 对于构建覆盖属性的数据，我们可以利用 工厂的 state 方法 }
     */
    $question = Question::factory()->published()->create();

    $this->assertNotNull($question->published_at);

  }
}
