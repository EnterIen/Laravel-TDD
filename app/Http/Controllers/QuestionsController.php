<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
  	
  }

  public function show(Question $question)
  {
    // $question = Question::whereNotNull('published_at')->findOrFail($question->id);

    return Question::with(['answers'])->find($question->id);

  	return view('questions.show', compact('question'));
  }

  public function store(Question $question)
  {
    $this->validate(request(), [
      'content' => 'required|string'
    ]);

  	$answer = $question->answers()->create([
      'user_id' => auth()->id(),
  		'content' => request('content'),
  	]);

  	return response()->json([], 200);
  }

  public function destroy(Answer $answer)
  {
    if (auth()->id() != $answer->user_id) {
      return response()->json([], 403);
    }

    $answer->delete();

    return response()->json([], 200);
  }
}
