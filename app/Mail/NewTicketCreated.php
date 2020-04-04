<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTicketCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Ticket instance.
     *
     * @var \App\Ticket
     */
    protected $ticket;

    /**
     * Create a new message instance.
     *
     * @param \App\Ticket $ticket
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@elegant-media.com', 'Elegant Media Support')
           ->to(
               $this->ticket->customer->email,
               $this->ticket->customer->name
           )
           ->subject('New Support Ticket Created')
           ->markdown(
               'emails.new-ticket',
               ['ticket' => $this->ticket]
           );
    }
}
