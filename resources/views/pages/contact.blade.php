
@extends('layouts.app')

@section('title', 'Contact Nesostar — Start a project')

@section('description', 'Contact Nesostar in Dar es Salaam to discuss a website, mobile application or software project.')

@section('content')

<section class="page-hero compact-hero">
    <p class="eyebrow">CONTACT</p>

    <h1>
        Let’s talk about<br>
        <em>what you’re building.</em>
    </h1>

    <p>
        Share a little about your idea. We’ll get back to you
        to discuss the next step.
    </p>
</section>

<section class="section contact-layout">

    <div class="contact-info">

        <p class="eyebrow">GET IN TOUCH</p>

        <h2>
            Good things start<br>
            with a conversation.
        </h2>

        <p>
            Tell us what you need, what you’re hoping to achieve
            or where you’re feeling stuck. We’re happy to help
            you think it through.
        </p>

        <div class="contact-line">
            <span>EMAIL</span>
            <a href="mailto:nesostar0@gmail.com">
                nesostar0@gmail.com
            </a>
        </div>

        <div class="contact-line">
            <span>PHONE</span>
            <a href="tel:+255626742729">
                +255 626 742 729
            </a>
        </div>

        <div class="contact-line">
            <span>LOCATION</span>
            <b>Dar es Salaam, Tanzania</b>
        </div>

        <div class="contact-line">
            <span>WORKING DAYS</span>
            <b>Monday – Friday</b>
        </div>

    </div>

    <div class="form-card">

        <p class="eyebrow">PROJECT INQUIRY</p>

        <h2>How can we help?</h2>

        {{-- Success message --}}
        @if(session('success'))
            <div class="success-message" role="status">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation error --}}
        @if($errors->any())
            <div class="error-message" role="alert">
                Please check the highlighted fields and try again.
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">

            @csrf

            <div class="form-row">

                <label>
                    Your name

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        maxlength="120"
                        required
                    >

                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label>
                    Email address

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        maxlength="180"
                        required
                    >

                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

            </div>

            <label>
                What do you need?

                <select name="service" required>

                    <option value="">Choose a service</option>

                    @foreach([
                        'Website or web application',
                        'Mobile application',
                        'Custom software system',
                        'Design and consultation',
                        'Something else'
                    ] as $service)

                        <option
                            value="{{ $service }}"
                            @selected(old('service') === $service)
                        >
                            {{ $service }}
                        </option>

                    @endforeach

                </select>

                @error('service')
                    <small>{{ $message }}</small>
                @enderror

            </label>

            <label>
                Tell us a little more

                <textarea
                    name="message"
                    rows="5"
                    maxlength="4000"
                    required
                >{{ old('message') }}</textarea>

                @error('message')
                    <small>{{ $message }}</small>
                @enderror

            </label>

            <button class="button button-dark" type="submit">
                Send inquiry <span>↗</span>
            </button>

            <p class="form-note">
                Your details are used to reply to this inquiry.
            </p>

        </form>

    </div>

</section>

@endsection
