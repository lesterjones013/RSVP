@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --line-width: 520px;
        }

        .navbar{
background: rgba(255,255,255,0.95);
backdrop-filter: blur(6px);
box-shadow: 10px 2px 10px rgba(0,0,0,0.05);
}

        /* navbar text for dark backgrounds */

.navbar-light-text .nav-link{
color:#ffffff !important;
}

.navbar-light-text .navbar-brand{
color:#ffffff !important;
}

/* navbar text for light backgrounds */

.navbar-dark-text .nav-link{
color:#333 !important;
}

.navbar-dark-text .navbar-brand{
color:#333 !important;
}

        .wedding-nav {
            position: fixed;
            top: 40px;
            z-index: 1050;
        }

        .nav-items .nav-link {
            letter-spacing: 4px;
            font-size: 20px;
            /* color: white !important; */

            opacity: 0;
            transform: translateY(20px);
            animation: navReveal 0.7s ease forwards;
        }

        .nav-items .nav-link:nth-child(1) { animation-delay: 0.2s; }
        .nav-items .nav-link:nth-child(2) { animation-delay: 0.4s; }
        .nav-items .nav-link:nth-child(3) { animation-delay: 0.6s; }
        .nav-items .nav-link:nth-child(4) { animation-delay: 0.8s; }
        .nav-items .nav-link:nth-child(5) { animation-delay: 1s; }
        .nav-items .nav-link:nth-child(6) { animation-delay: 1.2s; }
        .nav-items .nav-link:nth-child(7) { animation-delay: 1.4s; }
        .nav-items .nav-link:nth-child(8) { animation-delay: 1.6s; }

        .nav-line {
            width: 0;
            height: 1px;
            background: white;
            margin: 20px;

            animation: lineGrow 0.7s ease forwards;
            animation-delay: 1.4s;
        }

        .navbar[data-nav="dark"] .nav-line {
            background: #333;
        }

        @keyframes navReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes lineGrow {
            to {
                width: var(--line-width);
            }
        }

        @media (max-width: 992px) {
            :root {
                --line-width: 380px;
            }

            .wedding-nav {
                top: 30px;
            }

            .nav-items {
                gap: 20px !important;
            }

            .nav-items .nav-link {
                font-size: 16px;
                letter-spacing: 3px;
            }
        }

        @media (max-width: 576px) {
            :root {
                --line-width: 270px;
            }

            .wedding-nav {
                top: 20px;
            }

            .nav-items {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px !important;
            }

            .nav-items .nav-link {
                font-size: 13px;
                letter-spacing: 2px;
            }

            .nav-line {
                margin-top: 12px;
            }
        }
    </style>
@endpush

@section('content')
    <nav class="navbar fixed-top bg-transparent wedding-nav navbar-light-text">
        <div class="container justify-content-center flex-column align-items-center">
            <div class="d-flex gap-4 nav-items">
                <a class="nav-link libertinus-math-regular" href="/">HOME</a>
                <a class="nav-link libertinus-math-regular" href="#save-the-date">SAVE THE DATE</a>
                <a class="nav-link libertinus-math-regular" href="#story">STORY</a>
                <a class="nav-link libertinus-math-regular" href="#timeline">TIMELINE</a>
                <a class="nav-link libertinus-math-regular" href="#venue">VENUE</a>
                <a class="nav-link libertinus-math-regular" href="#entourage">ENTOURAGE</a>
                <a class="nav-link libertinus-math-regular" href="#faqs">FAQs</a>
                <a class="nav-link libertinus-math-regular" href="#rsvp">RSVP</a>
            </div>

            <span class="nav-line"></span>
        </div>
    </nav>

    @yield('page-content')
@endsection