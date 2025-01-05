<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tutorial extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'user_id',
        'description',
        'content',
        'keywords',
        // 'uniqid',
    ];

    /**
     * The tutorials that belong to the user.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * The lessons that belong to the tutorial.
     */
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'tutorial_lessons')
            ->withTimestamps();
    }

    /**
     * The lessons that belong to the tutorial for image purposes.
     */
    // public function getLessonsForImage(): BelongsToMany
    // {
    //     return $this->belongsToMany(Lesson::class, 'tutorial_lessons', 'tutorial_id', 'lesson_uniqid')
    //         ->withTimestamps();
    // }

    /**
     * The courses that belong to the tutorial.
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps();
    }

    /**
     * Returns image link of the tutorial
     */
    public function image(): Attribute
    {
        return Attribute::make(
            get: function () {
                // return $this->getLessonsForImage()->first()->image;
                return $this->lessons()->first()->image;
            }
        );
    }
}
