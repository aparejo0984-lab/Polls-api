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
        'option_text1_vote',
        'option_text2_vote',
        'option_text3_vote',
        'option_text4_vote',

    ];

    public function poll()
    {
        return $this->hasOne(Poll::class,'id', 'poll_id');
    }
}
