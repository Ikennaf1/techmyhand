<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'approved_by',
        'price',
        'status',
    ];

    /**
     * The course that belong to the product.
     */
    public function course(): BelongsTo
    {
        return $this->BelongsTo(Course::class);
    }
}
