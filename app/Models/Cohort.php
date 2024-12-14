<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

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
        'enroll_start',
        'enroll_end',
        'start_date',
        'end_date',
        'pioneer',
    ];

    /**
     * The product that belong to the cohort.
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }
}
