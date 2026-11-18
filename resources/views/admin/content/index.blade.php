@extends('admin.layouts.app')

@section('title', 'Website Content')

@section('page-heading', 'Website Content')

@section('content')
<style>
    .content-page {
        width: 100%;
    }

    .content-intro {
        margin-bottom: 24px;
    }

    .content-intro h2 {
        color: #17243b;
        font-size: 21px;
        margin-bottom: 7px;
    }

    .content-intro p {
        color: #7b8495;
        font-size: 13px;
        line-height: 1.7;
    }

    .content-notice {
        padding: 15px 17px;
        margin-bottom: 22px;
        border: 1px solid #dce7fa;
        border-radius: 9px;
        background: #f3f7ff;
        color: #3157a4;
        font-size: 13px;
        line-height: 1.7;
    }

    .content-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
    }

    .content-card {
        padding: 21px;
        background: #fff;
        border: 1px solid #e8ebf1;
        border-radius: 12px;
    }

    .content-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .content-section {
        color: #3157a4;
        background: #eef3ff;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
    }

    .content-status {
        color: #16804a;
        font-size: 11px;
        font-weight: 700;
    }

    .content-card h3 {
        color: #17243b;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .content-card p {
        color: #7b8495;
        font-size: 12px;
        line-height: 1.7;
        min-height: 42px;
    }

    .content-actions {
        display: flex;
        gap: 10px;
        margin-top: 19px;
    }

    .content-actions a {
        display: inline-block;
        padding: 9px 13px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    .preview-button {
        background: #17243b;
        color: #fff;
    }

    .preview-button:hover {
        background: #263e61;
    }

    .content-url {
        display: block;
        margin-top: 12px;
        color: #9aa3b1;
        font-size: 11px;
        overflow-wrap: anywhere;
    }

    @media (max-width: 650px) {
        .content-grid {
            grid-template-columns: 1fr;
        }

        .content-card {
            padding: 17px;
        }
    }
</style>

<div class="content-page">

    <div class="content-intro">
        <h2>Website Content Management</h2>
        <p>
            View the public pages that make up the Nesostar website
            and open them to inspect their current content.
        </p>
    </div>

    <div class="content-notice">
        <strong>Content management information:</strong>
        These pages are currently managed through Laravel Blade templates.
        The Preview buttons open the live public pages. Direct editing and
        publishing through this dashboard can be implemented as a separate CMS feature.
    </div>

    <div class="content-grid">

        @foreach ($pages as $page)

            <div class="content-card">

                <div class="content-card-top">
                    <span class="content-section">
                        {{ $page['section'] }}
                    </span>

                    <span class="content-status">
                        ● Available
                    </span>
                </div>

                <h3>{{ $page['title'] }}</h3>

                <p>{{ $page['description'] }}</p>

                <div class="content-actions">
                    <a
                        href="{{ $page['url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="preview-button"
                    >
                        Preview Page ↗
                    </a>
                </div>

                <span class="content-url">
                    {{ $page['url'] }}
                </span>

            </div>

        @endforeach

    </div>

</div>
@endsection