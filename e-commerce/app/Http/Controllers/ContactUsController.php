<?php

namespace App\Http\Controllers;

use App\Models\ContactUs; // Import the ContactUs model
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        $messages = ContactUs::all();

        return view('contact_us.index', compact('messages'));
    }

    /**
     * Store a newly created contact message in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
