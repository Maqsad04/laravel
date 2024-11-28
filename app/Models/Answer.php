<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'content', 'user_id', 'highlighted'];

    // An Answer belongs to a Question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // An Answer belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}