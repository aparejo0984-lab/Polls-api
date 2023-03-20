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
        'option_text',
        'vote_percentage'
    ];

    public function poll()
    {
        return $this->hasOne(Poll::class,'id', 'poll_id');
    }
}
