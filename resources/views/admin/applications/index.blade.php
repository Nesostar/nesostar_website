
@extends('admin.layouts.app')

@section('title', 'Developer Applications')

@section('page-heading', 'Developer Applications')

@section('content')
<style>
    .applications-page {
        width: 100%;
    }

    .applications-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .applications-header h2 {
        margin: 0 0 6px;
        font-size: 21px;
        color: #17243b;
    }

    .applications-header p {
        margin: 0;
        color: #7b8495;
        font-size: 13px;
    }

    .applications-count {
        background: #eef3ff;
        color: #3157a4;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
    }

    .applications-panel {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 12px;
        padding: 20px;
        overflow: hidden;
    }

    .applications-search {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        max-width: 540px;
    }

    .applications-search input {
        flex: 1;
        min-width: 0;
        padding: 11px 13px;
        border: 1px solid #dce2eb;
        border-radius: 7px;
        outline: none;
        font-size: 13px;
    }

    .applications-search input:focus {
        border-color: #3157a4;
    }

    .applications-search button {
        padding: 10px 17px;
        border: 0;
        border-radius: 7px;
        background: #17243b;
        color: #fff;
        cursor: pointer;
    }

    .applications-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .applications-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }

    .applications-table th {
        text-align: left;
        padding: 13px 12px;
        background: #f7f9fc;
        color: #697386;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .applications-table td {
        padding: 15px 12px;
        border-bottom: 1px solid #edf0f5;
        color: #344054;
        font-size: 13px;
    }

    .applications-table tr:last-child td {
        border-bottom: 0;
    }

    .applicant-name {
        font-weight: 700;
        color: #17243b;
    }

    .applicant-email {
        color: #778195;
        margin-top: 4px;
        font-size: 12px;
    }

    .application-date {
        color: #778195;
        white-space: nowrap;
    }

    .view-application {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 6px;
        background: #eef3ff;
        color: #3157a4;
        text-decoration: none;
        font-weight: 700;
        font-size: 12px;
        white-space: nowrap;
    }

    .view-application:hover {
        background: #dfe8ff;
    }

    .applications-empty {
        text-align: center;
        padding: 45px 15px;
        color: #7b8495;
    }

    .applications-empty strong {
        display: block;
        color: #344054;
        margin-bottom: 7px;
    }

    .applications-pagination {
        margin-top: 20px;
    }

    @media (max-width: 600px) {
        .applications-panel {
            padding: 13px;
        }

        .applications-search {
            width: 100%;
        }

        .applications-search button {
            padding: 10px 12px;
        }
    }
</style>

<div class="applications-page">

    <div class="applications-header">
        <div>
            <h2>Developer Applications</h2>
            <p>Review applications submitted through the developer program.</p>
        </div>

        <div class="applications-count">
            {{ $applications->total() }} Applications
        </div>
    </div>

    <div class="applications-panel">

        <form method="GET"
              action="{{ route('admin.applications.index') }}"
              class="applications-search">

            <input
                type="search"
                name="search"
                value="{{ $search }}"
                placeholder="Search by name, email or phone..."
            >

            <button type="submit">Search</button>

        </form>

        <div class="applications-table-wrapper">

            <table class="applications-table">

                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Phone</th>
                        <th>Portfolio</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($applications as $application)

                        <tr>
                            <td>
                                <div class="applicant-name">
                                    {{ $application->first_name }}
                                    {{ $application->second_name }}
                                    {{ $application->surname }}
                                </div>

                                <div class="applicant-email">
                                    {{ $application->email }}
                                </div>
                            </td>

                            <td>{{ $application->phone }}</td>

                            <td>
                                @if ($application->portfolio)
                                    <a href="{{ $application->portfolio }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        View Portfolio
                                    </a>
                                @else
                                    <span>Not provided</span>
                                @endif
                            </td>

                            <td class="application-date">
                                {{ $application->created_at->format('d M Y, H:i') }}
                            </td>

                            <td>
                                <a
                                    href="{{ route('admin.applications.show', $application) }}"
                                    class="view-application"
                                >
                                    View Application
                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5">
                                <div class="applications-empty">
                                    <strong>No applications found</strong>
                                    There are currently no developer applications matching your search.
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="applications-pagination">
            {{ $applications->links() }}
        </div>

    </div>

</div>
@endsection
