<?php

namespace App\Observers;

use App\Jobs\NotifyAdmin;
use App\Models\Gig;
use Illuminate\Bus\Dispatcher;

class GigObserver
{
    /**
     * Handle the Gig "created" event
     *
     * @param Gig $gig
     */
    public function created(Gig $gig)
    {
        $gig_job = new NotifyAdmin('created', $gig);

        dispatch($gig_job);
    }
}
