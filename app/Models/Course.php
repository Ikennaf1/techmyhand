<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
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
     * The courses that belong to the user.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * The tutorials that belong to the course.
     */
    public function tutorials(): BelongsToMany
    {
        return $this->belongsToMany(Tutorial::class, 'course_tutorials')
            ->withTimestamps();
    }

    /**
     * The products that belong to the course.
     */
    public function products(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
