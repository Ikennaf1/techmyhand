<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tutorial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'content',
        'keywords',
        'uniqid',
    ];

    /**
     * The users that belong to the role.
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
}
