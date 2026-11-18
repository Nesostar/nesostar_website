<?php

namespace App\Http\Controllers;

use App\Models\DeveloperApplication;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function storeContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'service' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:4000'],
        ]);

        Inquiry::create($validated);

        return redirect()->route('contact')->with('success', 'Thanks for reaching out. We’ll be in touch soon.');
    }

    public function storeApplication(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:80'],
            'second_name' => ['nullable', 'string', 'max:80'],
            'surname' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['required', 'string', 'max:40'],
            'instagram' => ['nullable', 'string', 'max:100'],
            'portfolio' => ['nullable', 'url', 'max:255'],
            'motivation' => ['required', 'string', 'max:3000'],
        ]);

        DeveloperApplication::create($validated);

        return redirect()->route('apply')->with('success', 'Application received. Thank you for your interest!');
    }
}
