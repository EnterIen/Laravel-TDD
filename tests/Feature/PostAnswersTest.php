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
        $question = Question::factory()->create();
        $user = User::factory()->create();

        $response = $this->post("/questions/{$question->id}/answers", [
            'user_id' => $user->id,
            'content' => 'This is an answer.'
        ]);

        $response->assertStatus(200);
    }


}
