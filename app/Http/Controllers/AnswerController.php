<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

use Auth;

class AnswerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function voteUp(Answer $answer)
  {
    $answer->voteUp(Auth::user());

    return response([], 200);
  }
}
