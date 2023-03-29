<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    public $table = 'poll_answer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'poll_id',
        'option_text1',
        'option_text2',
        'option_text3',
        'option_text4',
        'option1_vote_percentage',
        'option2_vote_percentage',
        'option3_vote_percentage',
        'option4_vote_percentage'
    ];

    public function poll()
    {
        return $this->hasOne(Poll::class,'id', 'poll_id');
    }
}
