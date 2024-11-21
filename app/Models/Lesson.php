<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'youtube_video_id',
        'user_id',
        'description',
        'uniqid',
        'summary',
        'keywords',
        'addendum_video_id',
    ];

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
