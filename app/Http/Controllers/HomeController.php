<?php

namespace App\Http\Controllers;

use App\Category;
use App\Priority;
use Illuminate\Http\Request;
use App\Filters\TicketFilters;
use App\Http\Controllers\Traits\Filterable;

class HomeController extends Controller
{
    use Filterable;

    /**
     * Show the application dashboard.
     *
     * @param Priority       $priority
     * @param TicketFilters $filters
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Priority $priority, TicketFilters $filters)
    {
        return view('home', [
            'tickets' => $this->getTickets($priority, $filters),
            'priorities' => Priority::all()
        ]);
    }
}
