@component('mail::message')
# New Ticket Request Created

Hi {{ $ticket->customer->name }},

Your support ticket request has been created and is awaiting consideration by an agent.
You can check your ticket status [here]({{ $ticket->path() }}).<br>

Sincerely,<br>
Elegant Media Support
@endcomponent
