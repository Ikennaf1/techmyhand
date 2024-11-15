<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'featured_image',
        'description',
    ];

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
