<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot(['id', 'grade', 'group_id'])
                    ->withTimestamps()
                    ->using(QuizUser::class)
                    ->as('history');
    }
}
