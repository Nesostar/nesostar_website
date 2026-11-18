
@extends('admin.layouts.app')

@section('title', 'Application Details')

@section('page-heading', 'Application Details')

@section('content')
<style>
    .application-detail-page {
        max-width: 1000px;
    }

    .application-detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 22px;
    }

    .application-detail-header h2 {
        margin: 0;
        font-size: 21px;
        color: #17243b;
    }

    .application-back {
        text-decoration: none;
        color: #3157a4;
        font-size: 13px;
        font-weight: 700;
    }

    .application-card {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 18px;
    }

    .application-card h3 {
        margin: 0 0 20px;
        color: #17243b;
        font-size: 16px;
    }

    .application-information {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .application-field label {
        display: block;
        color: #8790a0;
        text-transform: uppercase;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 7px;
    }

    .application-field p {
        margin: 0;
        color: #344054;
        font-size: 14px;
        overflow-wrap: anywhere;
    }

    .application-field a {
        color: #3157a4;
        overflow-wrap: anywhere;
    }

    .application-motivation {
        color: #344054;
        line-height: 1.8;
        font-size: 14px;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
    }

    @media (max-width: 600px) {
        .application-card {
            padding: 17px;
        }

        .application-information {
            grid-template-columns: 1fr;
            gap: 18px;
        }
    }
</style>

<div class="application-detail-page">

    <div class="application-detail-header">
        <h2>Developer Application</h2>

        <a href="{{ route('admin.applications.index') }}"
           class="application-back">
            ← Back to Applications
        </a>
    </div>

    <div class="application-card">

        <h3>Applicant Information</h3>

        <div class="application-information">

            <div class="application-field">
                <label>Full Name</label>
                <p>
                    {{ $application->first_name }}
                    {{ $application->second_name }}
                    {{ $application->surname }}
                </p>
            </div>

            <div class="application-field">
                <label>Email Address</label>
                <p>
                    <a href="mailto:{{ $application->email }}">
                        {{ $application->email }}
                    </a>
                </p>
            </div>

            <div class="application-field">
                <label>Phone Number</label>
                <p>
                    <a href="tel:{{ $application->phone }}">
                        {{ $application->phone }}
                    </a>
                </p>
            </div>

            <div class="application-field">
                <label>Instagram</label>
                <p>
                    @if ($application->instagram)
                        {{ $application->instagram }}
                    @else
                        Not provided
                    @endif
                </p>
            </div>

            <div class="application-field">
                <label>Portfolio</label>
                <p>
                    @if ($application->portfolio)
                        <a href="{{ $application->portfolio }}"
                           target="_blank"
                           rel="noopener noreferrer">
                            Open Portfolio
                        </a>
                    @else
                        Not provided
                    @endif
                </p>
            </div>

            <div class="application-field">
                <label>Date Submitted</label>
                <p>
                    {{ $application->created_at->format('d M Y, H:i') }}
                </p>
            </div>

        </div>

    </div>

    <div class="application-card">

        <h3>Applicant Motivation</h3>

        <div class="application-motivation">{{ $application->motivation }}</div>

    </div>

</div>
@endsection
