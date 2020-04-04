<?php

namespace App\Http\Controllers\Traits;

use App\Ticket;
use App\Priority;
use App\Filters\TicketFilters;

trait Filterable
{
    /**
     * Fetch all relevant tickets.
     *
     * @param Priority       $priority
     * @param TicketFilters $filters
     * @return mixed
     */
    protected function getTickets(Priority $priority, TicketFilters $filters)
    {
        $tickets = Ticket::where('user_id', user('id'))->latest()
            ->with('customer')
            ->filter($filters);

        if ($priority->exists) {
            $tickets->where('priority_id', $priority->id);
        }

        return $tickets->paginate(10);
    }
}
