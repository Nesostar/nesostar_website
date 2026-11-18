
@extends('layouts.app')

@section('title', 'Young Developer Program — Nesostar')

@section('description', 'Apply to Nesostar’s young developer program to learn through practical challenges and grow your development skills.')

@section('content')

<section class="page-hero">
    <p class="eyebrow">YOUNG DEVELOPER PROGRAM</p>

    <h1>
        Learn by building.<br>
        <em>Grow with community.</em>
    </h1>

    <p>
        We welcome emerging developers who want to sharpen their skills,
        share their work and take on meaningful challenges.
    </p>

    <a class="button button-lime" href="#application">
        Apply to the program <span>↓</span>
    </a>
</section>

<section class="section application-content">

    <div class="application-info">
        <p class="eyebrow">HOW IT WORKS</p>

        <h2>
            A practical path<br>
            to <em>your next level.</em>
        </h2>

        <p>
            Our program is designed for young creators who want to develop
            their skills through guided challenges and project-based learning.
        </p>

        <div class="application-steps">
            <p>
                <b>01</b>
                <span>Follow Nesostar’s official social channels for new challenge announcements.</span>
            </p>

            <p>
                <b>02</b>
                <span>Prepare your work and submit your application using the form.</span>
            </p>

            <p>
                <b>03</b>
                <span>We’ll contact you by email with updates and any challenge details.</span>
            </p>
        </div>

        <p class="small-note">
            Include a portfolio or sample project link if you have one.
            We’ll share challenge deadlines and any awards through our
            official channels when a challenge is announced.
        </p>
    </div>

    <div class="form-card" id="application">

        <p class="eyebrow">APPLICATION FORM</p>

        <h2>Introduce yourself.</h2>

        @if(session('success'))
            <div class="success-message" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message" role="alert">
                Please check the highlighted fields and try again.
            </div>
        @endif

        <form method="POST" action="{{ route('apply.store') }}">
            @csrf

            <div class="form-row">
                <label>
                    First name

                    <input
                        name="first_name"
                        value="{{ old('first_name') }}"
                        autocomplete="given-name"
                        maxlength="80"
                        required
                    >

                    @error('first_name')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label>
                    Second name <span class="optional">(optional)</span>

                    <input
                        name="second_name"
                        value="{{ old('second_name') }}"
                        maxlength="80"
                    >

                    @error('second_name')
                        <small>{{ $message }}</small>
                    @enderror
                </label>
            </div>

            <label>
                Surname

                <input
                    name="surname"
                    value="{{ old('surname') }}"
                    autocomplete="family-name"
                    maxlength="80"
                    required
                >

                @error('surname')
                    <small>{{ $message }}</small>
                @enderror
            </label>

            <div class="form-row">
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

                <label>
                    Phone number

                    <input
                        type="tel"
                        name="phone"
                        value="{{ old('phone') }}"
                        autocomplete="tel"
                        maxlength="40"
                        required
                    >

                    @error('phone')
                        <small>{{ $message }}</small>
                    @enderror
                </label>
            </div>

            <label>
                Instagram username <span class="optional">(optional)</span>

                <input
                    name="instagram"
                    value="{{ old('instagram') }}"
                    maxlength="100"
                    placeholder="@yourname"
                >

                @error('instagram')
                    <small>{{ $message }}</small>
                @enderror
            </label>

            <label>
                Portfolio or project link <span class="optional">(optional)</span>

                <input
                    type="url"
                    name="portfolio"
                    value="{{ old('portfolio') }}"
                    maxlength="255"
                    placeholder="https://"
                >

                @error('portfolio')
                    <small>{{ $message }}</small>
                @enderror
            </label>

            <label>
                What would you like to learn or build?

                <textarea
                    name="motivation"
                    rows="4"
                    maxlength="3000"
                    required
                >{{ old('motivation') }}</textarea>

                @error('motivation')
                    <small>{{ $message }}</small>
                @enderror
            </label>

            <button class="button button-dark" type="submit">
                Submit application <span>↗</span>
            </button>
        </form>

    </div>

</section>

@endsection
