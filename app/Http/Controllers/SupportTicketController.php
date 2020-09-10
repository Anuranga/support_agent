<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SupportTicketController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth')->except(['index', 'show']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tickets = SupportTicket::paginate(5);

        return view('list')->with([
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required|min:5',
            'email' => 'required|max:100|email',
            'phone' => 'required|numeric|digits:10',
        ]);

       //Generate Reference Number with timestamp and emailaddress
        $now = Carbon::now();
        $unique_code = $now->format('YmdHisu');

        $ticket = new SupportTicket([
        'customer_name' => $request['name'],
        'problem_description' => $request['description'],
        'email' => $request['email'],
        'phone_number' => $request['phone'],
        'reference_number' => $request['email'].$unique_code,
        'agent_reply' => ""
        ]);

        $ticket->save();

        return \App::make('redirect')->back()->with('flash_success', 'Thank you,!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function show(SupportTicket $supportTicket)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicket $supportTicket, $id)
    {
        $supportTicket = SupportTicket::find($id);

        return view('view')->with([
            'tickets' => $supportTicket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTicket $supportTicket, $id)
    {
        // Validate
         $validatedData = $request->validate([
            'reply' => 'required',
        ]);

        $supportTicket = SupportTicket::find($id);

        $supportTicket->agent_reply = $request['reply'];

        $supportTicket->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }
}
