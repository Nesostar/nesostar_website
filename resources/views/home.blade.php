@extends('layouts.app')
@section('title', 'Nesostar — Digital ideas, made real')
@section('content')
<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow"><span></span> DIGITAL PRODUCTS · DAR ES SALAAM</p>
        <h1>Let’s turn your<br><em>idea into impact.</em></h1>
        <p class="intro">We design and build websites, mobile apps and software systems that help people and businesses move forward.</p>
        <div class="hero-actions"><a class="button button-lime" href="{{ route('contact') }}">Start a project <span>↗</span></a><a class="button button-text" href="{{ route('services') }}">See what we do <span>→</span></a></div>
        <p class="location">Independent software studio <span>·</span> Tanzania</p>
    </div>
    <div class="hero-art" aria-hidden="true"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="idea-card"><div class="card-bar"><span>NESOSTAR / STUDIO</span><span>● ● ●</span></div><div class="code-lines"><p><i>01</i> <b class="pink">&lt;idea&gt;</b></p><p><i>02</i> <b>design</b><span>(with care)</span></p><p><i>03</i> <b class="lime">build</b><span>(for people)</span></p><p><i>04</i> <b class="pink">&lt;/idea&gt;</b></p></div><div class="card-footer">WEB <span>·</span> MOBILE <span>·</span> SOFTWARE <b>↗</b></div></div><div class="floating-label label-top">✦ Thoughtful by design</div><div class="floating-label label-bottom"><i></i> Ready to build</div></div>
    <a href="#home-services" class="scroll-cue">SCROLL TO EXPLORE <span>↓</span></a>
</section>
<div class="values-bar"><span>CREATIVE THINKING</span><i></i><span>CAREFUL ENGINEERING</span><i></i><span>MADE IN TANZANIA</span></div>
<section class="section services" id="home-services"><div class="section-heading"><div><p class="eyebrow">WHAT WE DO</p><h2>Technology for<br><em>what comes next.</em></h2></div><p>From your first idea to a polished product, we bring design and technology together to solve real problems.</p></div><div class="service-grid"><article class="service-card"><div class="service-icon">↗</div><p class="number">01 / BUILD</p><h3>Websites &amp; platforms</h3><p>Clear, responsive websites that tell your story and help customers take action.</p><a href="{{ route('services') }}">Explore web development <b>→</b></a></article><article class="service-card"><div class="service-icon">▣</div><p class="number">02 / CREATE</p><h3>Mobile applications</h3><p>Useful mobile experiences that keep your service close to the people who need it.</p><a href="{{ route('services') }}">Explore app development <b>→</b></a></article><article class="service-card"><div class="service-icon">⌘</div><p class="number">03 / IMPROVE</p><h3>Custom software</h3><p>Purpose-built systems that simplify daily work and grow with your organization.</p><a href="{{ route('services') }}">Explore software solutions <b>→</b></a></article></div></section>
<section class="about-strip"><div><p class="eyebrow">A SMALL TEAM, A BIG COMMITMENT</p><h2>Personal attention.<br><em>Professional results.</em></h2></div><p>We’re a Tanzania-based development company. You work directly with the people shaping and building your product, from the first conversation through launch.</p><a class="button button-outline" href="{{ route('about') }}">Get to know us <span>↗</span></a></section>
<section class="home-cta"><p class="eyebrow">HAVE A PROJECT IN MIND?</p><h2>Let’s make something<br><em>that matters.</em></h2><a class="button button-lime" href="{{ route('contact') }}">Tell us about it <span>↗</span></a></section>
@endsection
