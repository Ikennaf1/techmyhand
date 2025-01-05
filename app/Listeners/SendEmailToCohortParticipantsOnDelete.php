<?php

namespace App\Listeners;

use App\Events\CohortDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToCohortParticipantsOnDelete
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CohortDeleted $event): void
    {
        //
    }
}
