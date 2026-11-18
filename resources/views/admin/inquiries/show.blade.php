@extends('admin.layouts.app')

@section('title', 'Inquiry Details')
@section('page-heading', 'Inquiry Details')

@section('content')

<div class="page-heading">
    <h2>Message from {{ $inquiry->name }}</h2>
    <p>Read the full details of this website inquiry.</p>
</div>

<div class="panel" style="max-width:850px;">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:25px;">

        <h3 style="font-size:17px;">Inquiry Information</h3>

        <a href="{{ route('admin.inquiries.index') }}"
           class="button"
           style="background:#e9edf3;color:#26364c;">
            ← Back to Inquiries
        </a>

    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:22px;">

        <div>
            <p class="muted" style="font-size:11px;margin-bottom:7px;">FULL NAME</p>
            <strong style="font-size:14px;">{{ $inquiry->name }}</strong>
        </div>

        <div>
            <p class="muted" style="font-size:11px;margin-bottom:7px;">EMAIL ADDRESS</p>
            <a href="mailto:{{ $inquiry->email }}"
               style="font-size:14px;color:#244a80;text-decoration:none;">
                {{ $inquiry->email }}
            </a>
        </div>

        <div>
            <p class="muted" style="font-size:11px;margin-bottom:7px;">SERVICE</p>
            <strong style="font-size:14px;">{{ $inquiry->service }}</strong>
        </div>

        <div>
            <p class="muted" style="font-size:11px;margin-bottom:7px;">DATE RECEIVED</p>
            <strong style="font-size:14px;">
                {{ $inquiry->created_at?->format('d F Y, H:i') }}
            </strong>
        </div>

    </div>

    <div style="margin-top:30px;padding-top:23px;border-top:1px solid #edf0f4;">

        <h3 style="font-size:15px;margin-bottom:13px;">Message</h3>

        <div style="padding:20px;background:#f6f8fb;border:1px solid #e9edf3;border-radius:9px;font-size:14px;line-height:1.9;white-space:pre-wrap;overflow-wrap:anywhere;">{{ $inquiry->message }}</div>

    </div>

<div style="margin-top:30px;padding-top:25px;border-top:1px solid #edf0f4;">

    <h3 style="font-size:16px;margin-bottom:8px;">Reply to Inquiry</h3>

    <p class="muted" style="font-size:13px;margin-bottom:18px;">
        Send your response directly to {{ $inquiry->email }}.
    </p>

    @if(session('success'))
        <div style="padding:13px;margin-bottom:18px;background:#e8f7ee;color:#176b3a;border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="padding:13px;margin-bottom:18px;background:#fff0f0;color:#a12626;border-radius:8px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.inquiries.reply', $inquiry) }}">

        @csrf

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:13px;font-weight:600;margin-bottom:8px;">
                Recipient
            </label>

            <input type="email"
                   value="{{ $inquiry->email }}"
                   readonly
                   style="width:100%;padding:12px;border:1px solid #dce2eb;border-radius:7px;background:#f6f8fb;">
        </div>

        <div style="margin-bottom:18px;">
            <label style="display:block;font-size:13px;font-weight:600;margin-bottom:8px;">
                Subject
            </label>

            <input type="text"
                   value="Re: Your inquiry to Nesostar"
                   readonly
                   style="width:100%;padding:12px;border:1px solid #dce2eb;border-radius:7px;background:#f6f8fb;">
        </div>

        <div style="margin-bottom:18px;">
            <label for="reply_message"
                   style="display:block;font-size:13px;font-weight:600;margin-bottom:8px;">
                Your Reply
            </label>

            <textarea name="reply_message"
                      id="reply_message"
                      rows="8"
                      required
                      maxlength="10000"
                      placeholder="Write your response to the inquiry here..."
                      style="width:100%;padding:13px;border:1px solid #dce2eb;border-radius:7px;font-family:inherit;font-size:14px;line-height:1.7;resize:vertical;">{{ old('reply_message') }}</textarea>
        </div>

        <button type="submit"
                class="button"
                onclick="return confirm('Are you sure you want to send this email reply?')">
            Send Reply
        </button>

    </form>
</div>


</div>

@endsection