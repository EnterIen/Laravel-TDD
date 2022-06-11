<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
  // public function index()
  // {
  	
  // }

  // public function show(Question $question)
  // {
  //   $question = Question::whereNotNull('published_at')->findOrFail($question->id);

  // 	return view('questions.show', compact('question'));
  // }

  // public function store(Question $question)
  // {
  //   $question = Question::published()->findOrFail($question->id);

  // 	$answer = $question->answers()->create([
  // 		'user_id' => request('user_id'),
  // 		'content' => request('content'),
  // 	]);

  // 	return response()->json([], 200);
  // }
}
