@component('mail::message')
# Support Agent Has Left A Reply

Hi {{ $ticket->customer->name }},

One of our support agents have left a reply on your ticket.
You can check your ticket [here]({{ $ticket->path() }}).<br>

Sincerely,<br>
Elegant Media Support
@endcomponent
