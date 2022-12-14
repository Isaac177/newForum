<?php

namespace App\Notifications;

use App\Mail\NewReplyEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Reply;

class NewReplyNotification extends Notification
{
    use Queueable;

    public $reply;

    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(User $user)
    {
        return (new NewReplyEmail($this->reply))
                    ->to($user->emailAddress(), $user->name());
    }


    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_reply',
            'reply' => $this->reply->id,
            'replyAble_id' => $this->reply->replyAble_id,
            'replyAble_type' => $this->reply->replyAble_type,
            'replyAble_subject' => $this->reply->replyAble()->replyAbleSubject(),
        ];
    }
}
