<?php

namespace App\Jobs;

use App\Models\Gig;
use App\Models\User;
use App\Notifications\GigAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Collection $admins;

    /**
     * Create a new job instance for the gig object where an action occurs on the gig model by an auth user...
     *
     * @return void
     */
    public function __construct(public string $action, private array $gig, private User|Authenticatable $user)
    {
        $this->admins = User::query()->where('role', 'admin')->get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Get the administrators on the app and mail them in queues
        $this->admins->each(function (User $admin) {
            $admin->notify(new GigAction($this->action, $this->gig, $this->user));
        });
    }
}
