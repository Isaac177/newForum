<?php

namespace App\Notifications;

use App\Mail\NewReplyEmail;
use App\Models\Subscription;
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
    public $subscription;

    public function __construct(Reply $reply, Subscription $subscription)
    {
        $this->reply = $reply;
        $this->subscription = $subscription;
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
        return (new NewReplyEmail($this->reply, $this->subscription))
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
