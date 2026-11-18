@extends('admin.layouts.app')

@section('title', 'Inquiries')
@section('page-heading', 'Inquiries Management')

@section('content')

<div class="page-heading">
    <h2>Website Inquiries</h2>
    <p>Review and manage messages submitted through the contact page.</p>
</div>

<div class="panel">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:22px;">

        <div>
            <h3 style="font-size:16px;">All Inquiries</h3>
            <p class="muted" style="font-size:12px;margin-top:5px;">
                {{ $inquiries->total() }} inquiry record(s) found
            </p>
        </div>

        <form method="GET" action="{{ route('admin.inquiries.index') }}"
              style="display:flex;gap:8px;flex-wrap:wrap;">

            <input
                type="search"
                name="search"
                value="{{ $search }}"
                placeholder="Search inquiries..."
                style="width:230px;max-width:100%;padding:10px 12px;border:1px solid #dce2eb;border-radius:7px;font:inherit;font-size:12px;"
            >

            <button type="submit" class="button">Search</button>

            @if($search !== '')
                <a href="{{ route('admin.inquiries.index') }}"
                   class="button"
                   style="background:#e9edf3;color:#26364c;">
                    Clear
                </a>
            @endif

        </form>

    </div>

    @if(session('success'))
        <div style="padding:12px;margin-bottom:17px;background:#e8f7ee;color:#176b3a;border-radius:7px;font-size:13px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x:auto;">

        <table style="width:100%;border-collapse:collapse;text-align:left;min-width:680px;">

            <thead>
                <tr style="background:#f5f7fa;color:#657187;font-size:11px;text-transform:uppercase;">

                    <th style="padding:14px;">Name</th>
                    <th style="padding:14px;">Email</th>
                    <th style="padding:14px;">Service</th>
                    <th style="padding:14px;">Date Received</th>
                    <th style="padding:14px;">Action</th>

                </tr>
            </thead>

            <tbody>

                @forelse($inquiries as $inquiry)

                    <tr style="border-bottom:1px solid #edf0f4;font-size:12px;">

                        <td style="padding:15px 14px;font-weight:700;">
                            {{ $inquiry->name }}
                        </td>

                        <td style="padding:15px 14px;">
                            {{ $inquiry->email }}
                        </td>

                        <td style="padding:15px 14px;">
                            {{ $inquiry->service }}
                        </td>

                        <td style="padding:15px 14px;color:#788599;">
                            {{ $inquiry->created_at?->format('d M Y, H:i') }}
                        </td>

                        <td style="padding:15px 14px;">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                               class="button">
                                View Message
                            </a>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5"
                            style="padding:35px 15px;text-align:center;color:#8490a2;font-size:13px;">

                            @if($search !== '')
                                No inquiries matched your search.
                            @else
                                No inquiries have been submitted yet.
                            @endif

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div style="margin-top:22px;">
        {{ $inquiries->links() }}
    </div>

</div>

@endsection