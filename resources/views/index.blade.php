@extends('layouts.nav')

@section('title', 'Save the Date')

<style>
    body.no-scroll{
        overflow:hidden;
    }

    .mea-culpa-regular {
        font-family: "Mea Culpa", cursive;
        font-weight: 400;
        font-style: normal;
    }

    .hero {
        height: 100vh;
        width: 100%;
        background: url('{{ asset('images/hero.png') }}') center / cover no-repeat fixed;
        position: relative;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.25);
    }

    .hero-content {
        position: relative;
        z-index: 1;

        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        color: white;
        text-align: center;
    }

    .amp {
        margin: 0 12px;
        
        opacity: 0;
        animation: fadeOnly 1.2s ease forwards;
        animation-delay: 2.1s;

        font-size: 60px;
    }

    .groom {
        display: inline-block;
        opacity: 0;
        transform: translateY(-40px);
        animation: fadeFromTop 1.2s ease forwards;
        animation-delay: 1.6s;

        font-size: 160px;
    }

    .bride {
        display: inline-block;
        opacity: 0;
        transform: translateY(40px);
        animation: fadeFromBottom 1.2s ease forwards;
        animation-delay: 2.2s;

        font-size: 160px;
    }

    .hero-typing {
        margin-top: 20px;
        margin-left: 50px;
        font-size: 22px;
        letter-spacing: 10px;
        min-height: 1.5em;

        opacity: 0;
        transition: opacity: 0.6s ease;
    }

    .cursor {
        display: inline-block;
        margin-left: 4px;
        animation: blink 1s infinite;
    }

    .hero-typing span:not(.cursor) {
        opacity: 0;
        display: inline-block;
        transform: translateY(10px);
        animation: charFade 0.5s ease forwards;
    }

    .countdown-section {
        width: 100%;
        background: #f6f5f2;
        padding: 80px 20px;
        display: flex;
        justify-content: center;
    }

    .countdown-inner {
        width: 100%;
        max-width: 1200px;
        text-align: center;
        font-family: "Playfair Display", serif;
    }

    .countdown-inner h2 {
        font-size: 72px;
        letter-spacing: 4px;
        margin-bottom: 40px;
        font-weight: 400;
    }

    .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 60px;
    }

    .countdown-timer .time {
        text-align: center;
    }

    .countdown-timer .time .time-second {
        color: #555;
        font-size: 76px;
        margin-top: -20px;
    }

    .countdown-timer .time .label-second {
        margin-top: 10px;
    }

    .countdown-timer .number {
        font-size: 56px;
        font-weight: 400;
        display: block;
    }

    .countdown-timer .label {
        font-size: 12px;
        letter-spacing: 2px;
        margin-top: 20px;
        display: block;
    }

    .colon {
        font-size: 48px;
        font-weight: 300;
        line-height: 1;
        margin-top: 16px;
        font-family: "Playfair Display", serif;
        opacity: 1;
    }

    .date-block {
        margin-bottom: 80px;
    }


    .date-rsvp-section {
        width: 100%;
        padding: 100px 20px;
        background: #f3f0ec;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .date-rsvp-inner {
        text-align: center;
    }

    .wedding-date {
        font-family: "Playfair Display", serif;
        font-size: 64px;
        letter-spacing: 8px;
        margin-bottom: 10px;
        color: #222;
    }

    .wedding-location {
        font-size: 40px;
        color: #555;
        margin-top: -15px;
        margin-bottom: 20px;
    }

    .rsvp-btn {
        display: inline-block;
        padding: 10px 36px;
        border: 2px solid #222;          /* thicker border */
        border-radius: 50px;
        font-family: "Playfair Display", serif;
        font-weight: 600;                /* ✅ make RSVP bold */
        letter-spacing: 3px;
        text-decoration: none;
        color: #222;
        transition: all 0.3s ease;
    }


    .rsvp-btn:hover {
        background: #222;
        color: #fff;
    }

    /* Fade-in animation */
    .fade-in-section {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 1.2s ease, transform 1.2s ease;
    }

    .fade-in-section.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes fadeFromTop {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeFromBottom {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeOnly {
        to {
            opacity: 1;
        }
    }

    @keyframes charFade {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes blink {
        0%, 50%, 100% { 
            opacity: 1; 
        }
        25%, 75% { 
            opacity: 0; 
        }
    }

    @media (max-width: 1024px) {
        .groom, .bride {
            font-size: 140px;
        }

        .amp {
            font-size: 40px;
        }

        .hero-typing {
            margin-left: 18px;
        }

        .countdown-section {
            padding: 60px 20px;
        }

        .countdown-inner h2 {
            font-size: 62px;
        }

        .countdown-timer {
            gap: 40px;
        }

        .countdown-timer .time .time-second {
            font-size: 66px;
            margin-top: -17px;
        }

        .countdown-timer .time .label-second {
            margin-top: 7px;
        }

        .countdown-timer .number {
            font-size: 46px;
        }

        .colon {
            font-size: 40px;
        }

        .date-rsvp-section {
            padding: 60px 20px;
        }

        .wedding-date {
            font-size: 62px;
            letter-spacing: 6px;
        }

        .wedding-location {
            font-size: 36px;
        }
    }

    @media (max-width: 767px) {
        .groom, .bride {
            font-size: 120px;
        }

        .amp {
            font-size: 20px;
        }

        .hero-typing {
            font-size: 14px;
            margin-left: 16px;
            letter-spacing: 6px;
        }

        .countdown-section {
            padding: 40px 15px;
        }

        .countdown-inner h2 {
            font-size: 42px;
        }

        .countdown-timer {
            flex-wrap: wrap;
            gap: 30px;
        }

        .countdown-timer .time .time-second {
            font-size: 54px;
            margin-top: -17px;
        }

        .countdown-timer .time .label-second {
            margin-top: 7px;
        }

        .countdown-timer .number {
            font-size: 34px;
        }

        .colon {
            display: none;
        }

        .date-rsvp-section {
            padding: 40px 15px;
        }

        .wedding-date {
            font-size: 42px;
            letter-spacing: 4px;
        }

        .wedding-location {
            font-size: 34px;
            margin-top: -25px;
        }

        .story-img {
            height: auto;
        }
    }

    .story-title {
        font-size: 60px;
        line-height: 1.2;
        color: #222;
    }

    .story-text {
        font-family: "Playfair Display", serif;
        font-size: 16px;
        color: #555;
    }

    .story-signature {
        font-size: 34px;
    }

    .story-img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        border-radius: 6px;
        transition: transform 0.4s ease;
    }

    .story-img:hover {
        transform: scale(1.05);
    }

    .love-story-section {
        background: #f8f5f1;
        padding: 120px 20px;
    }

    .love-story-title {
        font-size: 72px;
        line-height: 1.2;
        color: #222;
    }

    .love-story-text {
        font-family: "Playfair Display", serif;
        font-size: 16px;
        color: #555;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .love-story-img {
        width: 100%;
        height: 650px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* ===============================
    WEDDING DETAILS SECTION
    ================================ */

    .wedding-details-section{
        background:#f3f0ec;
        padding:120px 20px;
    }

    .timeline-title{
        text-align:center;
        font-family:"Playfair Display", serif;
        font-size:54px;
        letter-spacing:4px;
    }

    .timeline-sub{
        text-align:center;
        font-family:"Mea Culpa", cursive;
        font-size:36px;
        margin-top:-10px;
        margin-bottom:60px;
    }


    /* ===============================
    TIMELINE
    ================================ */

    .timeline{
        position:relative;
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        max-width:1000px;
        margin:0 auto 80px auto;
    }

    /* horizontal connecting line */
    .timeline::before{
        content:"";
        position:absolute;
        top: 34px;
        left:0;
        width:100%;
        height:2px;
        background:#cfcfcf;
        z-index:0;
    }

    .timeline-item{
        position:relative;
        text-align:center;
        flex:1;
        z-index:1;
    }

    .timeline-time{
        font-size:14px;
        margin-bottom:8px;
        color:#555;
    }

    .timeline-dot{
        width:12px;
        height:12px;
        background:#222;
        border-radius:50%;
        margin:0 auto;
    }

    .timeline-label{
        font-size:12px;
        letter-spacing:2px;
        margin-top:8px;
    }


    /* ===============================
    DETAILS LEFT CONTENT
    ================================ */

    .details-left h3{
        font-size:38px;
        margin-bottom:10px;
    }

    .script{
        font-family:"Mea Culpa", cursive;
    }

    .details-text{
        font-size:15px;
        color:#555;
        line-height:1.7;
    }

    .hotel-btn{
        border:1px solid #222;
        border-radius:30px;
        padding:6px 16px;
        margin-right:10px;
        text-decoration:none;
        color:#222;
        font-size:12px;
        transition:0.3s;
    }

    .hotel-btn:hover{
        background:#222;
        color:#fff;
    }

    /* ===============================
    DRESS SECTION
    ================================ */

    .dress-section{
        margin-top:30px;
    }

    .family-row{
        display:flex;
        gap:30px;
        margin-bottom:30px;
        flex-wrap:wrap;
    }

    .family-col{
        flex:1;
        min-width:220px;
    }

    .dress-group{
        margin-bottom:30px;
    }

    .dress-section h4{
        font-family:"Playfair Display", serif;
        letter-spacing:1px;
        margin-bottom:6px;
    }

    .palette{
        display:flex;
        gap:10px;
        margin-top:10px;
    }

    .palette .color{
        width:34px;
        height:34px;
        border-radius:50%;
        border:1px solid #ddd;
    }

    /* ===============================
    DRESS TYPOGRAPHY
    ================================ */

    .dress-title{
        font-family:"Mea Culpa", cursive;
        font-size:60px !important;
        line-height:1;
        margin-bottom:30px;
        font-weight: 400;
    }

    .dress-title .script{
        font-family:"Mea Culpa", cursive;
        font-size:60px;
        margin-left:8px;
        font-weight: 400;
    }

    .dress-heading{
        font-family:"Playfair Display", serif;
        font-size:30px;
        letter-spacing:1px;
        margin-bottom:6px;
    }

    .family-title{
        font-family:"Mea Culpa", cursive !important;
        font-size:35px;
        line-height:1.1;
        margin-bottom:10px;
    }


    /* ===============================
    RIGHT IMAGE / MAP
    ================================ */

    .details-img{
        width:100%;
        height:600px;
        object-fit:cover;
        border-radius:8px;
    }


    /* ===============================
    TABLET (≤1024px)
    ================================ */

    @media (max-width:1024px){
        .timeline{
            flex-wrap:wrap;
            gap:40px 0;
        }

        .timeline::before{
            display:none;
        }

        .timeline-item{
            flex:0 0 25%;
        }

        .details-img{
            height:450px;
            margin-top:40px;
        }
    }


    /* ===============================
    MOBILE (≤767px)
    ================================ */

    @media (max-width:767px){
        .timeline{
            flex-direction:column;
            align-items:flex-start;
            gap:28px;
            padding-left:20px;
        }

        /* vertical timeline line */
        .timeline::before{
            display:block;
            width:2px;
            height:100%;
            left:6px;
            top:0;
        }

        .timeline-item{
            display:flex;
            align-items:center;
            gap:16px;
            flex:none;
            text-align:left;
        }

        .timeline-dot{
            margin:0;
        }

        .timeline-time{
            width:55px;
        }

        .timeline-label{
            margin-top:0;
        }

        .details-img{
            height:360px;
        }
    }

/* ===============================
   LOCATION SECTION
================================ */

    .location-section{
        background-image: url("/images/location-background.png");
        background-size: cover;
        background-position: center;
        padding:120px 20px;
        position:relative;
    }

    .location-row{
        background:rgba(0,0,0,0.45);
        border-radius:8px;
        padding:60px;
    }

    .location-left{
        color:white;
    }

    .venue-small{
        font-size:12px;
        letter-spacing:3px;
        text-transform:uppercase;
    }

    .venue-name{
        font-family:"Playfair Display", serif;
        font-size:64px;
        margin:10px 0 20px;
    }

    .venue-description{
        font-size:16px;
        line-height:1.7;
        margin-bottom:20px;
    }

    .venue-address{
        font-size:14px;
        letter-spacing:1px;
    }

    .location-map iframe{
        width:100%;
        height:420px;
        border-radius:8px;
    }

    @media (max-width:1024px){
        .location-row{
            padding:40px;
        }

        .venue-name{
            font-size:52px;
        }

        .location-map iframe{
            height:360px;
        }
    }

    @media (max-width:767px){
        .location-row{
            padding:30px 20px;
        }

        .location-left{
            margin-bottom:30px;
        }

        .venue-name{
            font-size:42px;
        }

        .location-map iframe{
            height:300px;
        }
    }
/* ===============================
   RSVP SECTION
================================ */

    .rsvp-section{
        background:#f3f0ec;
        padding:120px 20px;
    }

    .rsvp-left{
        padding:40px;
    }

    .rsvp-art{
        max-width:400px;
        margin:auto;
    }

    .rsvp-script{
        font-size:56px;
        margin-bottom:-20px;
    }

    .rsvp-big{
        font-family:"Playfair Display", serif;
        font-size:150px;
        line-height:0.9;
        color:#3b342e;
    }

    .rsvp-by{
        font-size:48px;
        margin-top:-10px;
    }

    .rsvp-date{
        margin-top:10px;
        font-family:"Playfair Display", serif;
        letter-spacing:4px;
    }

    .date-number{
        font-size:48px;
        margin:0 12px;
    }

    .rsvp-message{
        margin-top:30px;
        font-size:14px;
    }

    .rsvp-sub{
        font-size:13px;
        margin-top:10px;
        color:#555;
    }

    /* ===============================
    FORM
    ================================ */

    .rsvp-form{
        background:#ffffff;
        padding:40px;
        border-radius:10px;
    }

    .rsvp-box{
        border:1px solid #ddd;
        border-radius:10px;
        padding:20px;
        margin-bottom:20px;
    }

    .rsvp-label{
        display:block;
        font-family:"Playfair Display", serif;
        margin-bottom:12px;
    }

    .rsvp-input{
        width:100%;
        border:none;
        border-bottom:1px solid #ddd;
        padding:8px 4px;
        font-size:14px;
        outline:none;
    }

    .rsvp-input.small{
        margin-top:10px;
    }

    .attend-options{
        display:flex;
        gap:10px;
    }

    .attend-option{
        text-align:center;
        cursor:pointer;
    }

    .attend-option input{
        display:none;
    }

    .attend-icon{
        font-size:36px;
        color:#cfd5df;
        margin-bottom:6px;
    }

    .radio-line{
        display:block;
        margin-bottom:6px;
    }

    .rsvp-submit{
        margin-top:10px;
        background:#3d3f4b;
        color:white;
        border:none;
        padding:12px 28px;
        border-radius:8px;
        font-size:16px;
        cursor:pointer;
    }

    .rsvp-submit:hover{
        background:#222;
    }

    /* ===============================
    RESPONSIVE
    ================================ */

    @media (max-width:1024px){
        .rsvp-big{
            font-size:120px;
        }
    }

    @media (max-width:767px){
        .rsvp-left{
            margin-bottom:40px;
        }

        .rsvp-big{
            font-size:90px;
        }

        .rsvp-script{
            font-size:40px;
        }

        .rsvp-by{
            font-size:34px;
        }
    }

    .attend-option input {
        display: none;
    }

    .attend-option {
        cursor: pointer;
        border: 2px solid #ddd;
        padding: 12px 20px;
        border-radius: 10px;
        transition: all .3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .attend-option input:checked + .attend-icon {
        color: #fff;
    }

    .attend-option:has(input:checked) {
        background: #d6336c;
        color: white;
        border-color: #d6336c;
    }

    .rsvp-success{
        position:fixed;
        inset:0;
        background:rgba(0,0,0,0.5);
        display:flex;
        align-items:center;
        justify-content:center;
        z-index:9999;

        opacity:0;
        pointer-events:none;
        transition:opacity .3s ease;
    }

    .rsvp-success.show{
        opacity:1;
        pointer-events:auto;
    }

    .rsvp-success-box{
        background:white;
        padding:40px 50px;
        border-radius:12px;
        text-align:center;
        max-width:420px;
    }

    .success-heart{
        font-size:48px;
        margin-bottom:10px;
    }

    .rsvp-success-box h3{
        font-family:"Playfair Display", serif;
        margin-bottom:10px;
    }

    .rsvp-success-box button{
        margin-top:15px;
        padding:8px 18px;
        border:none;
        background:#3d3f4b;
        color:white;
        border-radius:6px;
        cursor:pointer;
    }
</style>

@section('page-content')
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-name">
                <span class="groom mea-culpa-regular">Art</span><br>
                <span class="amp mea-culpa-regular">&</span><br>
                <span class="bride mea-culpa-regular">Carla</span>
            </h1>
            <p class="hero-typing libertinus-math-regular" data-text="We're getting married."></p>
        </div>
    </section>

    <section class="countdown-section fade-in-section">
        <div class="countdown-inner">
            <h2>UNTIL THE BIG DAY!</h2>

            <div class="countdown-timer">
                <div class="time">
                    <span class="number" id="days">0</span>
                    <span class="label">DAYS</span>
                </div>

                <span class="colon">:</span>

                <div class="time">
                    <span class="number" id="hours">00</span>
                    <span class="label">HOURS</span>
                </div>

                <span class="colon">:</span>

                <div class="time">
                    <span class="number" id="minutes">00</span>
                    <span class="label">MINUTES</span>
                </div>
                
                <span class="colon">:</span>

                <div class="time">
                    <span class="number time-second" id="seconds">00</span>
                    <span class="label label-second">SECONDS</span>
                </div>
            </div>
        </div>
    </section>

    <section class="date-rsvp-section fade-in-section">
        <div class="container">

            <!-- CENTERED DATE BLOCK -->
            <div class="text-center date-block">
                <div class="wedding-date">04 . 14 . 2026</div>

                <div class="wedding-location mea-culpa-regular">
                    Manila, Philippines
                </div>

                <a href="#rsvp" class="rsvp-btn mt-4">RSVP</a>
            </div>

            <!-- STORY + IMAGES -->
            <div class="row align-items-center mt-5">

                <!-- LEFT MESSAGE -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="mea-culpa-regular story-title mb-4">
                        Love, joy, and <br> forever happiness.
                    </h2>

                    <p class="story-text">
                        As we begin this new chapter together, we warmly invite you to celebrate our wedding day with us.
                    </p>

                    <p class="story-text">
                        Here you'll discover our love story, event schedule, venue details, and everything you need to know.
                    </p>

                    <p class="mea-culpa-regular story-signature mt-4">
                        With love,<br>
                        Art & Carla
                    </p>
                </div>

                <!-- RIGHT IMAGES -->
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('images/photo1.png') }}" class="story-img">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('images/photo2.png') }}" class="story-img">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('images/photo3.png') }}" class="story-img">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('images/photo4.png') }}" class="story-img">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="love-story-section fade-in-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT IMAGE -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="{{ asset('images/love-story.png') }}" class="love-story-img">
                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-6">

                    <h2 class="mea-culpa-regular love-story-title mb-4">
                        Our love story
                    </h2>

                    <p class="love-story-text">
                        Once upon a time, in the bustling heart of a vibrant city, Art and Carla's paths crossed in the most unexpected of ways.
                    </p>

                    <p class="love-story-text">
                        From the moment they met, it was as if the universe had conspired to bring them together. Their first conversation flowed effortlessly, filled with laughter and shared dreams.
                    </p>

                    <p class="love-story-text">
                        Join us in celebrating two souls who found each other and built a love that will last a lifetime.
                    </p>

                </div>

            </div>
        </div>
    </section>
    <section class="wedding-details-section fade-in-section">
        <div class="container">

            <h2 class="timeline-title">WEDDING DAY</h2>
            <div class="timeline-sub">timeline</div>

            <div class="timeline">

                <div class="timeline-item">
                    <div class="timeline-time">2:30PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">CEREMONY</div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time">4:00PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">PHOTOS</div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time">5:00PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">PROGRAM</div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time">5:30PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">DANCE</div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time">6:00PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">DINNER</div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-time">8:00PM</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-label">END</div>
                </div>
            </div>

            <div class="row align-items-center">
                <!-- LEFT -->
                <div class="col-lg-6 details-left">
                    <h3 class="dress-title">Dress to impress</h3>
                    <p class="details-text mb-4">
                        We'd love for you to join us in celebrating in style with formal attire.
                        Our colour palette includes the tones below, so feel free to draw
                        inspiration from these colours if you wish.
                    </p>

                    <div class="dress-section mt-4">
                        <!-- FAMILY ROW -->
                        
                        <div class="family-row">
                            <!-- Family of Groom -->
                            
                            <div class="family-col">
                                <h4 class="dress-heading family-title">Family of Groom</h4>
                                <p class="details-text">Formal attire in shades of silver to gray</p>

                                <div class="palette">
                                    <span class="color" style="background:#cfcfcf"></span>
                                    <span class="color" style="background:#7a7a7a"></span>
                                </div>
                            </div>

                            <!-- Family of Bride -->
                            <div class="family-col">
                                <h4 class="dress-heading family-title">Family of Bride</h4>
                                <p class="details-text">Formal attire in shades of mauve to purple</p>

                                <div class="palette">
                                    <span class="color" style="background:#b7648f"></span>
                                    <span class="color" style="background:#9b7ab4"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Principal Sponsors -->
                        <div class="dress-group">
                            <h4 class="dress-heading family-title">Principal Sponsors</h4>
                            <p class="details-text">Formal attire in shades of dark purple</p>

                            <div class="palette">
                                <span class="color" style="background:#4b2c63"></span>
                                <span class="color" style="background:#6c2ea6"></span>
                                <span class="color" style="background:#7c3ed6"></span>
                                <span class="color" style="background:#5a2d91"></span>
                            </div>
                        </div>

                        <!-- Guests -->
                        <div class="dress-group">
                            <h4 class="dress-heading family-title">Guests</h4>
                            <p class="details-text">Formal attire in shades of lavender</p>

                            <div class="palette">
                                <span class="color" style="background:#a88bd8"></span>
                                <span class="color" style="background:#b78df0"></span>
                                <span class="color" style="background:#c79ad8"></span>
                                <span class="color" style="background:#7e4fe3"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6">
                    <img src="{{ asset('images/details-photo.png') }}" class="details-img">
                </div>
            </div>
        </div>
    </section>
    <section class="location-section fade-in-section">
        <div class="container">
            <div class="row align-items-center location-row">

                <!-- LEFT SIDE -->
                <div class="col-lg-6 location-left">
                    <p class="venue-small">THE VENUE</p>

                    <h2 class="venue-name">EMV Flower Farm</h2>

                    <p class="venue-description">
                        Our wedding will take place at a beautiful venue surrounded by natural scenery 
                        and timeless charm — an inviting flower farm nestled in the countryside where 
                        blooms, fresh air, and open fields create the perfect setting to celebrate with 
                        our closest family and friends.
                    </p>
                    <p class="venue-address">
                        Sitio Portugal, Brgy. Tambo Malaki<br>
                        Indang, Cavite
                    </p>
                </div>

                <!-- RIGHT SIDE -->
                <div class="col-lg-6 location-map">
                    <iframe
                        src="https://www.google.com/maps?q=EMV+Flower+Farm+Indang+Cavite&output=embed"
                        width="100%"
                        height="420"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <section id="rsvp" class="rsvp-section fade-in-section">
        <div class="container">

            <div class="row align-items-center">

                <!-- LEFT RSVP ART -->
                <div class="col-lg-6 rsvp-left text-center">
                    <div class="rsvp-art">

                        <div class="rsvp-script mea-culpa-regular">please</div>

                        <div class="rsvp-big">RS</div>
                        <div class="rsvp-big">VP</div>

                        <div class="rsvp-by mea-culpa-regular">by</div>

                        <div class="rsvp-date">
                            <span>APR</span>
                            <span class="date-number">14</span>
                            <span>2026</span>
                        </div>

                        <p class="rsvp-message">
                            We can’t wait to celebrate together!
                        </p>

                        <p class="rsvp-sub">
                            Kindly complete the RSVP form below.<br>
                            We’d love to hear from you!
                        </p>
                    </div>
                </div>

                <!-- RIGHT FORM -->
                <div class="col-lg-6">
                    <div class="rsvp-form">
                        <form id="rsvpForm"
                            action="https://docs.google.com/forms/d/e/1FAIpQLSdvUW0jSRLc45w4PlW-LShCucLG5kV31jPYWu5ITEGtz5JSjw/formResponse"
                            method="POST"
                            target="hidden_iframe"
                            onsubmit="submitted=true;">

                            <!-- ATTENDING -->
                            <div class="rsvp-box">
                                <label class="rsvp-label">Will you be attending? *</label>

                                <div class="attend-options">
                                    <label class="attend-option">
                                        <input type="radio" name="entry.2028946312" value="Yes">
                                        <div class="attend-icon">❤</div>
                                        <span>Yes</span>
                                    </label>

                                    <label class="attend-option">
                                        <input type="radio" name="entry.2028946312" value="No">
                                        <div class="attend-icon">💔</div>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <!-- NAME -->
                            <div class="rsvp-box">
                            <label class="rsvp-label">Full Name *</label>
                                <input type="text" name="entry.2074020740" class="rsvp-input" placeholder="Enter your name" required>
                            </div>

                            <!-- ATTENDEES -->
                            <div class="rsvp-box">
                                <label class="rsvp-label">
                                    Total number of attendees (yourself included)?
                                </label>

                                <label class="radio-line">
                                    <input type="radio" name="entry.1710188687" value="1"> 1
                                </label>

                                <label class="radio-line">
                                    <input type="radio" name="entry.1710188687" value="2"> 2
                                </label>

                                <label class="radio-line">
                                    <input type="radio" id="otherOption"> Other
                                </label>

                                <input type="text"
                                    name="entry.1710188687"
                                    id="otherGuests"
                                    class="rsvp-input small"
                                    placeholder="Specify your option"
                                    disabled>
                            </div>

                            <button type="submit" class="rsvp-submit">Submit</button>
                        </form>

                        <div id="rsvpSuccess" class="rsvp-success">
                            <div class="rsvp-success-box">
                                <div class="success-heart">❤</div>
                                <h3>RSVP Submitted!</h3>
                                <p>Thank you for confirming your attendance.<br>We can't wait to celebrate with you!</p>
                                <button onclick="closeRSVPPopup()">Close</button>
                            </div>
                        </div>

                        <iframe name="hidden_iframe" style="display:none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            const $el = $('.hero-typing');
            const text = $el.data('text');
            const typingDelay = 80;

            $el.empty().css('opacity', 0);

            // create cursor
            const $cursor = $('<span class="cursor">|</span>');
            $el.append($cursor);

            setTimeout(function () {

                // 👇 show container EXACTLY when typing begins
                $el.css('opacity', 1);

                let index = 0;

                const interval = setInterval(function () {
                    if (index >= text.length) {
                        clearInterval(interval);
                        return;
                    }

                    const char = text[index] === ' ' ? '\u00A0' : text[index];
                    const $span = $('<span>').text(char);

                    $cursor.before($span);
                    index++;
                }, typingDelay);

            }, 2800); // after name animation
        });

        $(document).ready(function () {
            const weddingDate = new Date('2026-04-14T00:00:00').getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = weddingDate - now;

                if (distance < 0) return;

                $('#days').text(Math.floor(distance / (1000 * 60 * 60 * 24)));
                $('#hours').text(Math.floor((distance / (1000 * 60 * 60)) % 24).toString().padStart(2, '0'));
                $('#minutes').text(Math.floor((distance / 1000 / 60) % 60).toString().padStart(2, '0'));
                $('#seconds').text(Math.floor((distance / 1000) % 60).toString().padStart(2, '0'));
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });

        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            document.querySelectorAll('.fade-in-section').forEach(section => {
                observer.observe(section);
            });
        });

        const otherOption = document.getElementById("otherOption");
        const otherGuests = document.getElementById("otherGuests");
        const guestRadios = document.querySelectorAll('input[id="otherOption"]');

        guestRadios.forEach(radio => {
            radio.addEventListener("change", function(){
                if(otherOption.checked){
                    otherGuests.disabled = false;
                    otherGuests.value = "";
                    otherGuests.focus();
                }else{
                    otherGuests.disabled = true;
                    otherGuests.value = "";
                }
            });
        });

        document.getElementById("rsvpForm").addEventListener("submit", function(){
            setTimeout(function(){
                document.getElementById("rsvpSuccess").classList.add("show");
                document.body.classList.add("no-scroll");
                document.getElementById("rsvpForm").reset();
            },800);
        });

        function closeRSVPPopup(){
            location.reload();
        }
    </script>
@endpush




