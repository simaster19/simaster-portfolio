<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Message;

class EmailNotification extends Notification
{
  use Queueable;

  /**
  * Create a new notification instance.
  */
  public function __construct($message) {
    $this->message = $message;
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
    ->subject("SiMaster19")
    ->action('Hubungi Saya', url('https://wa.me/6289635032061'))
    ->line("Terimakasih telah Menghubungi Saya, Secepat-cepatnya email kamu akan saya balas.");
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