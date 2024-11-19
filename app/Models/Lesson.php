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
        'video_link',
        'user_id',
        'short_description',
        'uniqid',
    ];

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
