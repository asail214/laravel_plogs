<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Posts - Premium Blog Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2d5016;
            --light-green: #4a7c59;
            --accent-green: #6b8e23;
            --gold: #d4af37;
            --light-gold: #f7dc6f;
            --dark-gold: #b8860b;
            --luxury-gradient: linear-gradient(135deg, #2d5016 0%, #4a7c59 50%, #d4af37 100%);
            --hero-overlay: linear-gradient(rgba(45, 80, 22, 0.7), rgba(74, 124, 89, 0.6), rgba(212, 175, 55, 0.4));
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .hero-section {
            height: 100vh;
            background: var(--hero-overlay),
            url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')
            center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;
        }

        .hero-content {
            text-align: center;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.7);
            color: white;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            font-weight: 300;
            line-height: 1.6;
        }

        .cta-button {
            background: var(--luxury-gradient);
            border: 2px solid var(--gold);
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.5);
            color: white;
            border-color: var(--light-gold);
        }

        .features-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.2);
            border-color: var(--gold);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--luxury-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }

        .feature-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 15px;
        }

        .feature-description {
            color: #666;
            line-height: 1.6;
        }

        .stats-section {
            background: var(--luxury-gradient);
            padding: 60px 0;
            color: white;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 900;
            color: var(--light-gold);
            display: block;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-top: 8px;
        }

        .luxury-footer {
            background: linear-gradient(135deg, #1a2f0f 0%, #2d5016 100%);
            color: white;
            padding: 60px 0 40px;
        }

        .footer-content {
            text-align: center;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 20px;
        }

        .footer-heart {
            color: var(--gold);
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--gold);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }

        .navbar-custom {
            background: rgba(45, 80, 22, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--gold);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.1rem;
            }
            .cta-button {
                padding: 15px 30px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="material-icons me-2">auto_stories</span>
                Laravel Posts
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('posts.index') }}">
                        <span class="material-icons me-1">home</span>
                        Posts
                    </a>
                    <a class="nav-link" href="{{ route('posts.create') }}">
                        <span class="material-icons me-1">add_circle</span>
                        Create
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="material-icons me-3" style="font-size: 4rem; vertical-align: middle;">auto_stories</span>
                Laravel Posts
            </h1>
            <p class="hero-subtitle">
                Craft beautiful stories, share powerful ideas, and connect with readers through our premium Laravel-powered blogging platform
            </p>
            <a href="{{ route('posts.index') }}" class="cta-button">
                <span class="material-icons">rocket_launch</span>
                Start Your Journey
            </a>
        </div>
        <div class="scroll-indicator">
            <span class="material-icons" style="font-size: 2rem;">keyboard_arrow_down</span>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-4 fw-bold mb-3" style="color: var(--primary-green); font-family: 'Playfair Display', serif;">
                        Why Choose Laravel Posts?
                    </h2>
                    <p class="lead" style="color: #666;">Experience the power of modern blogging with our feature-rich platform</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span class="material-icons">create</span>
                        </div>
                        <h3 class="feature-title">Rich Content Creation</h3>
                        <p class="feature-description">Create engaging posts with our intuitive editor. Express your thoughts with style and elegance.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span class="material-icons">speed</span>
                        </div>
                        <h3 class="feature-title">Lightning Fast</h3>
                        <p class="feature-description">Built on Laravel's robust framework, ensuring optimal performance and scalability.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span class="material-icons">security</span>
                        </div>
                        <h3 class="feature-title">Secure & Reliable</h3>
                        <p class="feature-description">Your content is safe with enterprise-grade security and automated backups.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="luxury-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <span class="material-icons me-2" style="font-size: 2rem; vertical-align: middle;">auto_stories</span>
                    Laravel Posts
                </div>
                <div>
                    <small style="opacity: 0.7;">
                    <p class="mb-0">
                    <span class="material-icons me-2" style="vertical-align: middle;">play_circle</span>
                    Special thanks to <strong>Codezilla YouTube Channel</strong> for the incredible tutorials!
                </p></small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>