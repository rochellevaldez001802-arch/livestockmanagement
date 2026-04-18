<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aparri Livestock Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        overflow-x: hidden;
    }

    /* HERO - EXACT SAME STYLE AS ORIGINAL */
  .hero-wrapper {
    position: relative;
    background: url('/images/background.png');
    background-size: cover;
    background-position: center;
    padding-bottom: 60px;
}

/* DARK OVERLAY */
.hero-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(201, 198, 198, 0.4); /* adjust darkness */
}

/* Make content appear above overlay */
.hero-wrapper > * {
    position: relative;
    z-index: 2;
}

    /* NAVBAR - MODERNIZED BUT SAME POSITION */
    nav {
        position: sticky;
        top: 0;
        z-index: 9999;

        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 8%;

        background: transparent; /* 🔥 key change */
        backdrop-filter: blur(8px); /* optional glass effect */
        box-shadow: none; /* remove shadow for clean blend */
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: bold;
        color: #0b3d1c;
        font-size: 18px;
        text-decoration: none;
    }

    .logo img {
        height: 45px;
    }

    .nav-links {
        display: flex;
        align-items: left;
    }

    .nav-links a {
        margin-left: 10px;
        text-decoration: none;
        color: #0b3d1c;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .nav-links a:hover {
        background: rgba(42, 102, 46, 0.1);
        color:white;
    }

    /* HERO CARD - EXACT SAME STYLE */
    .hero-card {
        max-width: 1000px;
        margin: 80px auto;
        background: rgba(28, 27, 27, 0.25);
        border-radius: 20px;
        padding: 50px;
        text-align: center;
        color: white;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        transition: transform 0.3s ease;
    }

    .hero-card:hover {
        transform: translateY(-5px);
    }

    .hero-card h1 {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .hero-card p {
        font-size: 15px;
        margin-bottom: 30px;
    }

    .login-btn {
        background: #0b5e20;
        padding: 12px 40px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s ease;
        border: 2px solid rgba(255,255,255,0.3);
    }

    .login-btn:hover {
        background: #1b5e20;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(11, 94, 32, 0.4);
    }

    /* ABOUT SECTION */
    .section {
        padding: 80px 8%;
        text-align: center;
        max-width: 1400px;
        margin: 0 auto;
    }

    .section h2, .section h3 {
        color: #1b5e20;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
    }

    .section h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #1b5e20;
        border-radius: 2px;
    }

    .about-desc {
        max-width: 1000px;
        margin: 0 auto 45px;
        font-size: 17px;
        color: #151515;
        line-height: 1.5;
         text-align: center;
    }

    /* CARDS GRID - MISSION & VISION SWAPPED */
    .grid {
        margin-top: 50px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        max-width: 1100px;
        margin-left: auto;
        margin-right: auto;
        align-items: start;
    }

    /* LEFT COLUMN STACK */
    .left-column {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .card {
        background: #ddd;
        padding: 50px 25px;
        border-left: 5px solid #1b5e20;
        border-radius: 15px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .card.small {
        background: white;
        padding: 35px 30px;
        border-radius: 15px;
        border-left: 6px solid #1b5e20;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        text-align: left;
        min-height: 200px;
        height: auto;
    }

    .mission-card {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .mission-intro {
    font-size: 14px;
    color: #555;
    margin-bottom: 12px;
    line-height: 1.6;
}

    .mission-list {
        padding-left: 18px;
    }

    .mission-list li {
        font-size: 15px;
        color: #666;
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .card.small::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #1b5e20, #2e7d32);
    }

    .card.small:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.15);
    }

    .card.small h3 {
        color: #1b5e20;
        margin-bottom: 15px;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card.small h3 i {
        color: #2e7d32;
        font-size: 22px;
    }

    .card.small p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    /* SERVICES */
    .service-grid {
        margin-top: 40px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .service {
        background: linear-gradient(135deg, #8fb39c, #a5d6a7);
        padding: 45px 25px;
        color: #1b5e20;
        font-weight: 700;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(143, 179, 156, 0.3);
        position: relative;
        overflow: hidden;
    }

    .service::before {
        content: attr(data-icon);
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 48px;
        opacity: 0.1;
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
    }

    .service:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(143, 179, 156, 0.4);
    }

    .service.large {
        grid-column: span 2;
        padding: 55px 35px;
        font-size: 18px;
    }
    /* FOOTER STYLE CONTACT */
    .contact {
        background: #0b3d1c;
        color: white;
        padding: 40px 8%;
    }

    .contact-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .contact h2 {
        font-size: 22px;
        margin-bottom: 5px;
        color: #a5d6a7;
    }

    .contact-left p {
        font-size: 14px;
        color: #ddd;
    }

    .contact-right {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .contact-right div {
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .contact-container {
            flex-direction: column;
            text-align: center;
        }

        .contact-right {
            justify-content: center;
        }
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero-card {
            margin: 40px 20px;
            padding: 40px 25px;
        }
        
        .hero-card h1 {
            font-size: 28px;
        }
        
        nav {
            padding: 15px 5%;
            flex-direction: column;
            gap: 15px;
        }
        
        .grid, .service-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }
        
        .service.large {
            grid-column: span 1;
        }
    }

    /* SMOOTH SCROLLING */
    html {
        scroll-behavior: smooth;
    }
    </style>
</head>
<body>
    <div class="hero-wrapper">
          <nav>
            <div class="logo">
                <img src="{{ asset('images/aparri.png') }}" alt="Logo">
                <span>APARRI LIVESTOCK MANAGEMENT</span>
            </div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact Us</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                @endif
            </div>
        </nav>

        <div class="hero-card">
            <h1>LiveStock Management And Monitoring System</h1>
            <p>A livestock management and monitoring system is a technology-driven solution designed to track, analyze, and manage the health, behavior, and productivity of farm animals.</p>
            <a href="{{ route('login') }}" class="login-btn">LOGIN</a>
        </div>
    </div>

    <!-- ABOUT -->
    <section class="section" id="about">
        <h2>About Us</h2>
        <p class="about-desc">
            The Municipal Agriculture Office - Aparri (OAS-Aparri), located in Centro 1,
            Aparri, Cagayan, supports local farmers and fishers through technical training,
            registry, and financial assistance including initiatives with the Bureau of Fisheries and Aquatic Resources (BFAR). It facilitates agriculture
            development and helps manage livelihood projects in the municipality.
        </p>

        <div class="grid">

            <!-- LEFT SIDE -->
            <div class="left-column">

             <div class="card small">
                    <h3><i class="fas fa-cow"></i> More Description</h3>
                    <p>
                        Our livestock management system helps monitor livestock records,
                        track animal health, and assist farmers in managing agricultural
                        resources efficiently within the municipality of Aparri.
                    </p>
                </div>

                <div class="card small">
                    <h3><i class="fas fa-eye "></i> Vision</h3>
                    <p>
                        The golden frontier of the North in trade, education, agro-fishery
                        industry and eco-tourism with modern, green and disaster-resilient
                        infrastructure and empowered citizens.
                    </p>
                </div>

               

            </div>

            <!-- RIGHT SIDE -->
            <div class="card small mission-card">
                <h3><i class="fas fa-bullseye"></i> Mission</h3>

                <p class="mission-intro">
                    The Local Government of Aparri aims to serve with humility and uphold 
                    the principles of Republic Act 7160 for excellent and responsive governance.
                </p>

                <ul class="mission-list">
                    <li>God-fearing, empowered, and self-reliant citizens in a safe and balanced environment</li>
                    <li>Holistic community development with active public participation</li>
                    <li>A business-friendly and economically vibrant municipality</li>
                    <li>Protection and preservation of environmental resources</li>
                    <li>Balanced and responsive community development planning</li>
                    <li>Committed, dynamic, and proactive governance</li>
                </ul>
            </div>

        </div>
    </section>

    <!-- SERVICES -->
    <section class="section">
        <h3>OTHER SERVICES OFFERED</h3>
        <div class="service-grid">
            <div class="service" data-icon="&#xf62e;">Vaccination Records</div>
            <div class="service" data-icon="&#xf0f1;">Health Monitoring</div>
            <div class="service" data-icon="&#xf15c;">Animal Registry</div>
            <div class="service" data-icon="&#xf080;">Reports & Analytics</div>
            <div class="service large" data-icon="&#xf007;">Farmer Support</div>
            <div class="service large" data-icon="&#xf1b3;">Training Programs</div>
            <div class="service" data-icon="&#xf15c;">Animal Registry</div>
        </div>
    </section>

    <section class="contact" id="contact">
    <div class="contact-container">

        <!-- LEFT SIDE -->
        <div class="contact-left">
            <h2>Aparri Livestock Management</h2>
            <p>Supporting farmers through innovation and technology.</p>
        </div>

        <!-- RIGHT SIDE -->
        <div class="contact-right">
            <div>📘 AGUAPAY</div>
            <div>📞 0920 XXXX XXXX</div>
            <div>✉ example@example.com</div>
        </div>

        </div>
    </section>
</body>
</html>