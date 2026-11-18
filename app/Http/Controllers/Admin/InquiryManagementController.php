<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Throwable;

class InquiryManagementController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $inquiries = Inquiry::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('service', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.inquiries.index', compact(
            'inquiries',
            'search'
        ));
    }

    public function show(Inquiry $inquiry): View
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function sendReply(Request $request, Inquiry $inquiry): RedirectResponse
{
    $validated = $request->validate([
        'reply_message' => ['required', 'string', 'max:10000'],
    ]);

    try {
        Mail::raw($validated['reply_message'], function ($message) use ($inquiry, $request) {
            $message->to($inquiry->email, $inquiry->name)
                ->subject('Re: Your inquiry to Nesostar');

            if ($request->user()?->email) {
                $message->replyTo(
                    $request->user()->email,
                    $request->user()->name
                );
            }
        });

        return back()->with(
            'success',
            'Your reply was sent successfully to ' . $inquiry->email
        );

    } catch (Throwable $e) {
        report($e);

        return back()->withInput()->withErrors([
            'email' => 'The email could not be sent. Please check your mail configuration and try again.',
        ]);
    }
}
}