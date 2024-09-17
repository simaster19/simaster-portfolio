<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\SubscribeMe;

class EmailSubscribeMe extends Notification
{
  use Queueable;

  /**
  * Create a new notification instance.
  */
  public function __construct($post) {
    $this->post = $post;
  }

  /**
  * Get the notification's delivery channels.
  *
  * @return array<int, string>
  */
  public function via(object $notifiable): array
  {
    return ['mail'];
  }

  /**
  * Get the mail representation of the notification.
  */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
    ->line('New article published: ' . $this->post->title)
    ->action('Read Article', url('/blog/'.$this->post->slug))
    ->line('Thank you for subscribing to our blog!');
  }

  /**
  * Get the array representation of the notification.
  *
  * @return array<string, mixed>
  */
  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}