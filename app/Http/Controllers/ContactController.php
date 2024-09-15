<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return inertia('ContactUs'); // Returning the ContactUs Vue component
    }
    public function submit(Request $request)
    {
        // Validate the contact form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email or store in the database (Example: sending an email)
        Mail::send([], [], function ($message) use ($request) {
            $message->to('support@company.com') // Your support email
                    ->subject($request->subject)
                    ->from($request->email, $request->name)
                    ->setBody($request->message, 'text/html');
        });

        // Optionally store the message in a database
        // ContactMessage::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        // ]);

        // Redirect back with a success message
        return back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
    }
}
