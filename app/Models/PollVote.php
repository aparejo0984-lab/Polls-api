<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class PollVote extends Model
{
    public $table = 'poll_vote';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'poll_id',
        'user_id',
        'poll_answer_id',
        'given_answer'
    ];

    public function poll()
    {
        return $this->hasOne(Poll::class,'id', 'poll_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function answer()
    {
        return $this->hasOne(PollAnswer::class,'id', 'poll_answer_id');
    }
}
