<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailAdminNotification extends Notification
{
  use Queueable;

  /**
  * Create a new notification instance.
  */
  public function __construct($admin, $data) {
    $this->admin = $admin;
    $this->data = $data;
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
    ->subject("Pesan Dari Pengguna : ".$this->data->nama)
    ->action('Redirect', url('/admin/message'))
    ->line("Email : ".$this->data->email)
    ->line("Subject : ".$this->data->subject)
    ->line("Message : ".$this->data->message)
    ->line('Cek Dashboard Message!');
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