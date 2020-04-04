<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Customer;
use App\Priority;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::search($request->q);

        if ($tickets->get()->count() == 0) {
            $tickets = Ticket::whereCustomerId(
                Customer::search($request->q)->first()->id
            );
        }

        return view('home', [
            'priorities' => Priority::all(),
            'tickets' => $tickets->where('user_id', user('id'))
                ->paginate(10)
        ]);
    }
}
