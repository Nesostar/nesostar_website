@extends('admin.layouts.app')

@section('title', 'Administrator Settings')

@section('page-heading', 'Administrator Settings')

@section('content')
<style>
    .settings-page {
        max-width: 950px;
    }

    .settings-intro {
        margin-bottom: 23px;
    }

    .settings-intro h2 {
        color: #17243b;
        font-size: 21px;
        margin-bottom: 7px;
    }

    .settings-intro p {
        color: #7b8495;
        font-size: 13px;
        line-height: 1.7;
    }

    .settings-alert {
        padding: 13px 16px;
        margin-bottom: 18px;
        border-radius: 8px;
        font-size: 13px;
    }

    .settings-success {
        background: #eaf8f0;
        color: #176b40;
        border: 1px solid #c8ebd6;
    }

    .settings-error {
        background: #fff0f0;
        color: #a52c2c;
        border: 1px solid #f3cccc;
    }

    .settings-card {
        padding: 24px;
        margin-bottom: 20px;
        background: #fff;
        border: 1px solid #e8ebf1;
        border-radius: 12px;
    }

    .settings-card h3 {
        color: #17243b;
        font-size: 16px;
        margin-bottom: 7px;
    }

    .settings-card-description {
        color: #8790a0;
        font-size: 12px;
        line-height: 1.7;
        margin-bottom: 22px;
    }

    .settings-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .settings-field {
        margin-bottom: 17px;
    }

    .settings-field label {
        display: block;
        color: #4b5565;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .settings-field input {
        width: 100%;
        padding: 12px 13px;
        border: 1px solid #dce2eb;
        border-radius: 7px;
        outline: none;
        color: #344054;
        font: inherit;
        font-size: 13px;
    }

    .settings-field input:focus {
        border-color: #3157a4;
    }

    .settings-field .field-error {
        display: block;
        color: #c0392b;
        font-size: 11px;
        margin-top: 6px;
    }

    .settings-button {
        padding: 11px 17px;
        border: 0;
        border-radius: 7px;
        background: #17243b;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .settings-button:hover {
        background: #263e61;
    }

    .settings-role {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 20px;
        background: #eef3ff;
        color: #3157a4;
        font-size: 11px;
        font-weight: 700;
    }

    @media (max-width: 650px) {
        .settings-card {
            padding: 17px;
        }

        .settings-form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }
    }
</style>

<div class="settings-page">

    <div class="settings-intro">
        <h2>Administrator Settings</h2>
        <p>
            Manage your administrator account details and password.
        </p>
    </div>

    @if (session('success'))
        <div class="settings-alert settings-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="settings-alert settings-error">
            <strong>Please correct the following:</strong>
            <ul style="margin: 8px 0 0 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="settings-card">

        <h3>Administrator Profile</h3>

        <p class="settings-card-description">
            Update the name and email address associated with your administrator account.
        </p>

        <div style="margin-bottom: 20px;">
            <span class="settings-role">Administrator Account</span>
        </div>

        <form method="POST" action="{{ route('admin.settings.profile') }}">
            @csrf

            <div class="settings-form-grid">

                <div class="settings-field">
                    <label for="name">Full Name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $admin->name) }}"
                        required
                        maxlength="120"
                    >

                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="settings-field">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $admin->email) }}"
                        required
                        maxlength="255"
                    >

                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <button type="submit" class="settings-button">
                Save Profile Changes
            </button>

        </form>

    </div>

    <div class="settings-card">

        <h3>Change Password</h3>

        <p class="settings-card-description">
            Enter your current password and choose a new password.
            The new password must contain at least eight characters.
        </p>

        <form method="POST" action="{{ route('admin.settings.password') }}">
            @csrf

            <div class="settings-field">
                <label for="current_password">Current Password</label>

                <input
                    type="password"
                    id="current_password"
                    name="current_password"
                    autocomplete="current-password"
                    required
                >

                @error('current_password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="settings-form-grid">

                <div class="settings-field">
                    <label for="password">New Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="new-password"
                        required
                    >

                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="settings-field">
                    <label for="password_confirmation">Confirm New Password</label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        autocomplete="new-password"
                        required
                    >
                </div>

            </div>

            <button type="submit" class="settings-button">
                Change Password
            </button>

        </form>

    </div>

</div>
@endsection