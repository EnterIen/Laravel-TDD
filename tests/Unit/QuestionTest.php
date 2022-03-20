<?php

namespace Tests\Unit;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
{
	use RefreshDatabase;
  /**
   * A basic unit test example.
   *
   * @return void
   */
  public function testQuestionHasManyAnswers()
  {
    $Question = Question::factory()->create();

    // 创建关联关系
    $answer = Answer::factory()->create(['question_id' => $Question->id]);

    $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\HasMany', $Question->answers());
  }
}
