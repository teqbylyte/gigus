<?php

namespace App\Notifications;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GigAction extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance for the gig array containing the necessary of the info.
     *
     * @return void
     */
    public function __construct(public string $action, private array $gig, private Authenticatable|User $user)
    {

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
        return $this->action == 'created' ?
            (new MailMessage)
                ->subject('Gig Created')
                ->greeting('Hello Admin,')
                ->line('A new gig has been created by ' . $this->user->name)
                ->line('Gig role: ' . $this->gig['role_name'] )
                ->line('Gig Company: ' . $this->gig['company_name'] )
                ->line('Salary: ' . moneyFormat($this->gig['min_salary']) . ' - ' . moneyFormat($this->gig['max_salary']) )
                ->line('Thank you!') :

            (new MailMessage)
                ->subject('Gig Deleted')
                ->greeting('Hello Admin,')
                ->line('A gig has been deleted by ' . $this->user->name)
                ->line('Gig role: ' . $this->gig['role_name'] )
                ->line('Gig Company: ' . $this->gig['company_name'] )
                ->line('Salary: ' . moneyFormat($this->gig['min_salary']) . ' - ' . moneyFormat($this->gig['max_salary']) )
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
