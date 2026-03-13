@extends('layouts.app')

@push('styles')
    <style>
        :root {
            --line-width: 520px;
        }

        .wedding-nav {
            position: fixed;
            top: 40px;
            z-index: 1050;
        }

        .nav-items .nav-link {
            letter-spacing: 4px;
            font-size: 20px;
            color: white !important;

            opacity: 0;
            transform: translateY(20px);
            animation: navReveal 0.7s ease forwards;
        }

        .nav-items .nav-link:nth-child(1) { animation-delay: 0.2s; }
        .nav-items .nav-link:nth-child(2) { animation-delay: 0.4s; }
        .nav-items .nav-link:nth-child(3) { animation-delay: 0.6s; }
        .nav-items .nav-link:nth-child(4) { animation-delay: 0.8s; }
        .nav-items .nav-link:nth-child(5) { animation-delay: 1s; }

        .nav-line {
            width: 0;
            height: 1px;
            background: white;
            margin: 20px;

            animation: lineGrow 0.7s ease forwards;
            animation-delay: 1.4s;
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
    <nav class="navbar fixed-top bg-transparent wedding-nav">
        <div class="container justify-content-center flex-column align-items-center">
            <div class="d-flex gap-4 nav-items">
                <a class="nav-link libertinus-math-regular" href="#story">STORY</a>
                <a class="nav-link libertinus-math-regular" href="#rsvp">RSVP</a>
                <a class="nav-link libertinus-math-regular" href="#timeline">TIMELINE</a>
                <a class="nav-link libertinus-math-regular" href="#details">DETAILS</a>
                <a class="nav-link libertinus-math-regular" href="#faq">FAQ</a>
            </div>

            <span class="nav-line"></span>
        </div>
    </nav>

    @yield('page-content')
@endsection