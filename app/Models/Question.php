<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'comments_disabled'];
    

    // A Question belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A Question can have many Answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}