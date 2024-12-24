<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Cohort extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'product_id',
        'user_id',
        'discount',
        'enroll_start',
        'enroll_end',
        'start_date',
        'end_date',
        'pioneer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'enroll_start',
        'enroll_end',
        'start_date',
        'end_date',
    ];

    public function enrollStart(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }

    public function enrollEnd(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }

    public function startDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }

    public function endDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)
        );
    }

    /**
     * The product that belong to the cohort.
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }

    /**
     * The user that owns to the cohort.
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
