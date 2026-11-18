<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Nesostar designs and builds websites, mobile apps and custom software in Tanzania.')">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/nesostar-logo.png') }}?v=3">
    <title>@yield('title', 'Nesostar — Digital ideas, made real')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="Nesostar home">
            <img class="brand-mark" src="{{ asset('images/nesostar-logo.png') }}" alt="Nesostar">
            <span class="brand-copy"><span class="brand-name">Nesostar</span><span class="brand-tagline">Digital studio</span></span>
        </a>
        <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false">☰</button>
        <nav class="main-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
            <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
            <a href="{{ route('services') }}" @if(request()->routeIs('services')) aria-current="page" @endif>Services</a>
            <a href="{{ route('insights') }}" @if(request()->routeIs('insights')) aria-current="page" @endif>Insights</a>
            <a href="{{ route('apply') }}" @if(request()->routeIs('apply')) aria-current="page" @endif>Developer program</a>
            <a class="nav-cta" href="{{ route('contact') }}">Let’s talk <span>↗</span></a>
        </nav>
    </header>

    <main>@yield('content')</main>

    <footer class="site-footer">
        <div class="footer-top">
            <div><a class="footer-brand" href="{{ route('home') }}"><img src="{{ asset('images/nesostar-logo.png') }}" alt="Nesostar"></a><p>Digital ideas, made real in Tanzania.</p></div>
            <div class="footer-links"><a href="{{ route('about') }}">About</a><a href="{{ route('services') }}">Services</a><a href="{{ route('insights') }}">Insights</a><a href="{{ route('apply') }}">Developer program</a><a href="{{ route('contact') }}">Contact</a></div>
            <div class="footer-contact"><p class="eyebrow">SAY HELLO</p><a href="mailto:nesostar0@gmail.com">nesostar0@gmail.com</a><a href="tel:+255626742729">+255 626 742 729</a><span>Dar es Salaam, Tanzania</span></div>
        </div>
        <div class="footer-bottom"><span>© {{ date('Y') }} Nesostar Company Ltd.</span><span>Designed with purpose in Tanzania.</span></div>
    </footer>

    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-nav');
        menuButton?.addEventListener('click', () => {
            const isOpen = mainNav.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
        });
    </script>
</body>
</html>
