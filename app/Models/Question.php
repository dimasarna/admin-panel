<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'answer',
        'type',
    ];

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }
}
