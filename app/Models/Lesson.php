<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
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
        'content',
        'youtube_video_id',
        'user_id',
        'description',
        // 'uniqid',
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

    /**
     * The tutorials that belong to the lesson.
     */
    public function tutorials(): BelongsToMany
    {
        return $this->belongsToMany(Tutorial::class)
            ->withTimestamps();
    }

    /**
     * Returns image link of the leson
     */
    public function image(): Attribute
    {
        return Attribute::make(
            get: function () {
                return 'https://img.youtube.com/vi/' . $this->youtube_video_id . '/hqdefault.jpg';
            }
        );
    }
}
