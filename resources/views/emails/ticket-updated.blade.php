@component('mail::message')
# Ticket Has Been {{ $ticket->status . 'ed' }}

Hi {{ $ticket->customer->name }},

Your support ticket is now {{ $ticket->status . 'ed' }}. You can check your ticket status [here]({{ $ticket->path() }}).<br>

Sincerely,<br>
Elegant Media Support
@endcomponent
