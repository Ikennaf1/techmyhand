<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTutorial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'tutorial_uniqid',
    ];
}
