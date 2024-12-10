<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'amount',
        'orderID',
        'reference',
        'description',
    ];

    /**
     * The payments that belong to the user.
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
