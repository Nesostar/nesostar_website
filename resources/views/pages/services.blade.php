
@extends('layouts.app')

@section('title', 'Services — Nesostar')

@section('description', 'Explore Nesostar services: business websites, web applications, mobile apps and custom software systems.')

@section('content')

<style>
/* =========================================
   NESOSTAR SERVICES PAGE
========================================= */

.services-page {
    width: 100%;
    overflow: hidden;
}

.services-page *,
.services-page *::before,
.services-page *::after {
    box-sizing: border-box;
}

.services-page .services-hero {
    width: 100%;
    min-height: 390px;
    padding: clamp(65px, 10vw, 115px) 7%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: #111713;
    color: #ffffff;
}

.services-page .eyebrow {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    line-height: 1.6;
    color: #a8d84e;
    margin: 0 0 20px;
}

.services-page .services-hero h1 {
    max-width: 850px;
    font-size: clamp(38px, 6.5vw, 76px);
    line-height: 1.08;
    letter-spacing: -3px;
    margin: 0 0 22px;
    overflow-wrap: anywhere;
}

.services-page .services-hero h1 em {
    color: #b5e65c;
    font-style: normal;
}

.services-page .hero-description {
    max-width: 620px;
    font-size: clamp(15px, 1.7vw, 18px);
    line-height: 1.8;
    color: #c4ccc5;
    margin: 0;
}

/* SERVICE CARDS */

.services-page .service-detail-list {
    width: min(1180px, 86%);
    margin: 0 auto;
    padding: 75px 0;
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
}

.services-page .service-card {
    min-width: 0;
    position: relative;
    display: flex;
    flex-direction: column;
    padding: clamp(25px, 3.5vw, 42px);
    background: #f5f7f2;
    border: 1px solid #e7ebe3;
    border-radius: 20px;
    transition: transform .25s ease, box-shadow .25s ease;
}

.services-page .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(20, 35, 20, .08);
}

.services-page .detail-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 43px;
    height: 43px;
    border-radius: 12px;
    background: #e7f2d4;
    color: #344c1c;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 27px;
}

.services-page .service-card .eyebrow {
    margin-bottom: 12px;
    color: #648b31;
    font-size: 11px;
}

.services-page .service-card h2 {
    font-size: clamp(23px, 2.7vw, 34px);
    line-height: 1.2;
    letter-spacing: -1px;
    color: #172019;
    margin: 0 0 17px;
    overflow-wrap: anywhere;
}

.services-page .service-card > div > p:not(.eyebrow) {
    font-size: 15px;
    line-height: 1.8;
    color: #657066;
    margin: 0 0 22px;
}

.services-page .check-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.services-page .check-list li {
    position: relative;
    padding: 9px 0 9px 27px;
    font-size: 14px;
    line-height: 1.6;
    color: #37443a;
    border-top: 1px solid #e5eae1;
}

.services-page .check-list li::before {
    content: "✓";
    position: absolute;
    left: 0;
    top: 9px;
    color: #79a936;
    font-weight: 800;
}

.services-page .detail-icon {
    position: absolute;
    right: 28px;
    top: 28px;
    width: 46px;
    height: 46px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 14px;
    background: #ffffff;
    color: #648b31;
    font-size: 22px;
    font-weight: 700;
}

/* CALL TO ACTION */

.services-page .services-cta {
    width: 86%;
    max-width: 1180px;
    margin: 0 auto 75px;
    padding: clamp(30px, 6vw, 65px);
    border-radius: 22px;
    background: #172019;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 35px;
}

.services-page .services-cta .eyebrow {
    margin-bottom: 15px;
}

.services-page .services-cta h2 {
    font-size: clamp(27px, 4vw, 45px);
    line-height: 1.2;
    letter-spacing: -1.5px;
    margin: 0;
}

.services-page .services-cta h2 em {
    color: #b5e65c;
    font-style: normal;
}

.services-page .services-cta .button {
    flex-shrink: 0;
    text-decoration: none;
}

/* TABLETS */

@media (max-width: 900px) {
    .services-page .service-detail-list {
        width: 90%;
        gap: 18px;
        padding: 55px 0;
    }

    .services-page .services-cta {
        width: 90%;
    }
}

/* MOBILE */

@media (max-width: 640px) {
    .services-page .services-hero {
        min-height: auto;
        padding: 70px 6% 65px;
    }

    .services-page .services-hero h1 {
        font-size: clamp(36px, 10vw, 52px);
        letter-spacing: -1.8px;
        line-height: 1.12;
    }

    .services-page .hero-description {
        font-size: 15px;
        line-height: 1.75;
    }

    .services-page .service-detail-list {
        width: 90%;
        grid-template-columns: 1fr;
        gap: 17px;
        padding: 42px 0;
    }

    .services-page .service-card {
        padding: 27px 23px;
        border-radius: 16px;
    }

    .services-page .service-card h2 {
        font-size: 27px;
    }

    .services-page .detail-icon {
        right: 20px;
        top: 20px;
        width: 40px;
        height: 40px;
    }

    .services-page .services-cta {
        width: 90%;
        margin-bottom: 45px;
        flex-direction: column;
        align-items: flex-start;
        gap: 25px;
        padding: 32px 25px;
        border-radius: 17px;
    }

    .services-page .services-cta h2 {
        font-size: 31px;
    }

    .services-page .services-cta .button {
        width: 100%;
        text-align: center;
        justify-content: center;
    }
}

/* VERY SMALL PHONES */

@media (max-width: 360px) {
    .services-page .services-hero {
        padding-left: 5%;
        padding-right: 5%;
    }

    .services-page .services-hero h1 {
        font-size: 34px;
    }

    .services-page .service-detail-list,
    .services-page .services-cta {
        width: 92%;
    }

    .services-page .service-card {
        padding: 23px 18px;
    }

    .services-page .service-card h2 {
        font-size: 24px;
    }
}
</style>

<div class="services-page">

    <!-- PAGE HERO -->
    <section class="services-hero">
        <p class="eyebrow">OUR SERVICES</p>

        <h1>
            Technology that<br>
            <em>moves you forward.</em>
        </h1>

        <p class="hero-description">
            We combine design, development and practical thinking
            to create tools that work for your people.
        </p>
    </section>

    <!-- SERVICES -->
    <section class="service-detail-list">

        <!-- WEB DEVELOPMENT -->
        <article class="service-card">
            <span class="detail-number">01</span>

            <div>
                <p class="eyebrow">WEB DEVELOPMENT</p>

                <h2>A better home<br>for your business.</h2>

                <p>
                    Custom business websites, online stores, booking
                    platforms and web applications. Built to load quickly,
                    look polished on mobile and make it easy for people
                    to take action.
                </p>

                <ul class="check-list">
                    <li>Business and portfolio websites</li>
                    <li>E-commerce and booking platforms</li>
                    <li>Web applications and dashboards</li>
                </ul>
            </div>

            <div class="detail-icon" aria-hidden="true">&lt;/&gt;</div>
        </article>

        <!-- MOBILE APPLICATIONS -->
        <article class="service-card">
            <span class="detail-number">02</span>

            <div>
                <p class="eyebrow">MOBILE APPLICATIONS</p>

                <h2>Useful experiences,<br>wherever life happens.</h2>

                <p>
                    Mobile applications that make your service more
                    accessible and help customers stay connected
                    on the go.
                </p>

                <ul class="check-list">
                    <li>Android and cross-platform apps</li>
                    <li>Customer-facing mobile experiences</li>
                    <li>App integrations and ongoing support</li>
                </ul>
            </div>

            <div class="detail-icon" aria-hidden="true">▣</div>
        </article>

        <!-- CUSTOM SOFTWARE -->
        <article class="service-card">
            <span class="detail-number">03</span>

            <div>
                <p class="eyebrow">CUSTOM SOFTWARE</p>

                <h2>Systems designed<br>around your work.</h2>

                <p>
                    Practical software that reduces repetitive tasks,
                    keeps information organized and gives your team
                    a clearer picture of the business.
                </p>

                <ul class="check-list">
                    <li>Business management systems</li>
                    <li>Workflow and data tools</li>
                    <li>Maintenance and technical support</li>
                </ul>
            </div>

            <div class="detail-icon" aria-hidden="true">⌘</div>
        </article>

        <!-- DESIGN AND CONSULTATION -->
        <article class="service-card">
            <span class="detail-number">04</span>

            <div>
                <p class="eyebrow">DESIGN &amp; CONSULTATION</p>

                <h2>Find the right<br>first step.</h2>

                <p>
                    Need help turning an idea into a clear plan?
                    We can map requirements, advise on suitable
                    technology and define a sensible project scope.
                </p>

                <ul class="check-list">
                    <li>Project discovery and planning</li>
                    <li>Product and interface design</li>
                    <li>Technical guidance</li>
                </ul>
            </div>

            <div class="detail-icon" aria-hidden="true">✳</div>
        </article>

    </section>

    <!-- CALL TO ACTION -->
    <section class="services-cta">
        <div>
            <p class="eyebrow">NOT SURE WHERE TO START?</p>

            <h2>
                Tell us what you’re<br>
                <em>trying to solve.</em>
            </h2>
        </div>

        <a class="button button-lime"
           href="{{ route('contact') }}">
            Start a conversation <span>↗</span>
        </a>
    </section>

</div>

@endsection
