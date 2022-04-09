<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class QuizUser extends Pivot
{
    public $incrementing = true;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
