<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

  protected $guarded = [];

  public function voteUp($user)
  {
    $this->votes('vote_up')->create(['user_id' => $user->id, 'type' => 'vote_up']);
  }

  /**
   * { 拥有该回答的所有投票 }
   *
   * @param      <type>  $type   The type
   *
   * @return     <type>  ( description_of_the_return_value )
   */
  public function votes($type)
  {
    return $this->morphMany(Vote::class, 'voted')->where($type);
  }
}
