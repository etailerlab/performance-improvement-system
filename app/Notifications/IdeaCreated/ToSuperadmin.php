<?php

namespace App\Notifications\IdeaCreated;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Idea;

class ToSuperadmin extends Notification
{
    use Queueable;

    /**
     * @var Idea
     */
    protected $idea;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
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
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('Добавлена новая идея.')
            ->view('emails.idea-created.to-superadmin', ['idea' => $this->idea]);
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
