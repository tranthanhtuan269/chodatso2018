<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAndAnswer extends Model
{
    protected $table = "question_answer";
    protected $fillable = ['question','answer','user_created'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
