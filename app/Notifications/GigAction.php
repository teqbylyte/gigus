<?php

namespace App\Notifications;

use App\Models\Gig;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GigAction extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public string $action, private Gig $gig)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $user = auth()->user();

        return $this->action == 'created' ?
            (new MailMessage)
                ->subject('Gig Created')
                ->greeting('Hello Admin,')
                ->line('A new gig has been created by ' . $user->name)
                ->line('Gig role: ' . $this->gig->role->name )
                ->line('Gig Company: ' . $this->gig->company->name )
                ->line('Salary: ' . moneyFormat($this->gig->min_salary ). ' - ' . moneyFormat($this->gig->max_salary ))
                ->action('View gig', url(route('gigs.index')))  // Normally, this would point to the gig instance instead of all gigs
                ->line('Thank you!'):

            (new MailMessage)
                ->subject('Gig Deleted')
                ->greeting('Hello Admin,')
                ->line('A gig has been deleted by ' . $user->name)
                ->line('Gig role: ' . $this->gig->role->name )
                ->line('Gig Company: ' . $this->gig->company->name )
                ->line('Salary: ' . moneyFormat($this->gig->min_salary) . ' - ' . moneyFormat($this->gig->max_salary) )
                ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
