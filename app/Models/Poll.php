<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Poll extends Model
{
    public $table = 'poll';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'question',
        'enable'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }

}
