<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Priority;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Concerns\CreatesCustomer;
use App\Http\Requests\TicketStore;

class TicketController extends Controller
{
    use CreatesCustomer;

    /**
     * Create new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'show', 'find']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TicketStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStore $request)
    {
        $data = $request->validated();

        $ticket = Ticket::create(array_merge($data, $this->createsCustomer($data)));

        cache()->put('link', $ticket->path());

        return success(
            route('success', ['token' => Str::random(20)]),
            'New support ticket created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Priority $priority, Ticket $ticket)
    {
        return view('show', compact('ticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $ticket = Ticket::whereUid($request->uid)->first();

        if (! is_null($ticket)) {
            return response([
                'link' => $ticket->path()
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Priority $priority, Ticket $ticket, string $status)
    {
        $ticket->markAs($status);

        return back()->with(['message' => 'Ticket '. strtolower($status)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return success(route('home'), 'Ticket deleted');
    }
}
