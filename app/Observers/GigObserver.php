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
//        $gig_job = new NotifyAdmin('created', $this->getGigInfo($gig), auth()->user());
//
//        dispatch($gig_job);
    }

    public function deleted(Gig $gig)
    {
//        $gig_job = new NotifyAdmin('deleted', $this->getGigInfo($gig), auth()->user());
//
//        dispatch($gig_job);
    }

    private function getGigInfo(Gig $gig)
    {
        $info = $gig->only('min_salary', 'max_salary', 'uuid', 'id');
        $info['company_name'] = $gig->company->name;
        $info['role_name'] = $gig->role->name;

        return $info;
    }
}
