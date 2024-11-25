<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialLesson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'tutorial_id',
        'lesson_uniqid',
    ];
}
