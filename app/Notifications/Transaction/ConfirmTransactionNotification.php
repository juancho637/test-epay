<?php

namespace App\Notifications\Transaction;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmTransactionNotification extends Notification
{
    use Queueable;

    protected $userToken;
    protected $transactionCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $userToken, int $transactionCode)
    {
        $this->userToken = $userToken;
        $this->transactionCode = $transactionCode;
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
            ->line('Link to confirm your payment.')
            ->action('Confirm', url("/api/v1/transactions/confirm?token={$this->userToken}&code={$this->transactionCode}"));
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
