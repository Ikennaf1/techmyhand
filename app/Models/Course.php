<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
     * Get the attributes that should be cast
     */
    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean'
        ];
    }

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
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    /**
     * Returns status of the course
     */
    public function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->product->status;
            }
        );
    }

    /**
     * Check if course is approved
     * by adding a dynamic attribute
     */
    public function isApproved(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->product->status === 'approved'
                    ? 1
                    : 0;
            }
        );
    }
}
