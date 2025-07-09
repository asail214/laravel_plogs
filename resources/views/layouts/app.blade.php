<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Posts - @yield('title')</title>
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
            --card-shadow: 0 8px 30px rgba(45, 80, 22, 0.15);
            --hover-shadow: 0 12px 40px rgba(45, 80, 22, 0.25);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e8f5e8 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-luxury {
            background: var(--luxury-gradient) !important;
            box-shadow: 0 4px 20px rgba(45, 80, 22, 0.3);
            border-bottom: 2px solid var(--gold);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px !important;
            margin: 0 5px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(212, 175, 55, 0.2);
            color: var(--light-gold) !important;
            transform: translateY(-2px);
        }

        .main-content {
            flex: 1;
            padding: 3rem 0;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 1rem;
        }

        .page-subtitle {
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .card-luxury {
            border: none;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            background: white;
            transition: all 0.3s ease;
            overflow: hidden;
            border: 2px solid transparent;
        }

        .card-luxury:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
            border-color: var(--gold);
        }

        .card-header-luxury {
            background: var(--luxury-gradient);
            color: white;
            font-weight: 600;
            padding: 1.5rem;
            border: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body-luxury {
            padding: 2rem;
        }

        .btn-luxury-primary {
            background: var(--luxury-gradient);
            border: 2px solid var(--gold);
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-luxury-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
            color: white;
            border-color: var(--light-gold);
        }

        .btn-luxury-success {
            background: linear-gradient(135deg, #4a7c59 0%, #6b8e23 100%);
            border: 2px solid var(--accent-green);
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-luxury-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(107, 142, 35, 0.4);
            color: white;
            border-color: var(--light-green);
        }

        .btn-luxury-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border: 2px solid #17a2b8;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .btn-luxury-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(23, 162, 184, 0.4);
            color: white;
        }

        .btn-luxury-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: 2px solid #dc3545;
            color: white;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .btn-luxury-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(220, 53, 69, 0.4);
            color: white;
        }

        .btn-luxury-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            border: 2px solid #6c757d;
            color: white;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-luxury-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.4);
            color: white;
        }

        .table-luxury {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            background: white;
        }

        .table-luxury thead th {
            background: var(--luxury-gradient);
            color: white;
            border: none;
            font-weight: 600;
            padding: 1.2rem;
            font-size: 0.95rem;
        }

        .table-luxury tbody td {
            padding: 1.2rem;
            vertical-align: middle;
            border-top: 1px solid rgba(45, 80, 22, 0.1);
        }

        .table-luxury tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .form-control-luxury {
            border-radius: 15px;
            border: 2px solid #e9ecef;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control-luxury:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .form-label-luxury {
            font-weight: 600;
            color: var(--primary-green);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-luxury {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f1aeb5 100%);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .empty-state .material-icons {
            font-size: 4rem;
            color: var(--gold);
            margin-bottom: 1rem;
        }

        .luxury-footer {
            background: linear-gradient(135deg, #1a2f0f 0%, #2d5016 100%);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: auto;
        }

        .footer-content {
            text-align: center;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--gold);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .footer-heart {
            color: var(--gold);
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .badge-luxury {
            background: var(--luxury-gradient);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            .card-body-luxury {
                padding: 1.5rem;
            }
            .btn-luxury-primary, .btn-luxury-success, .btn-luxury-secondary {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-luxury">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <span class="material-icons">auto_stories</span>
                Laravel Posts
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="/">
                        <span class="material-icons">home</span>
                        Home
                    </a>
                    <a class="nav-link" href="{{ route('posts.index') }}">
                        <span class="material-icons">article</span>
                        All Posts
                    </a>
                    <a class="nav-link" href="{{ route('posts.create') }}">
                        <span class="material-icons">add_circle</span>
                        Create Post
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer class="luxury-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <span class="material-icons">auto_stories</span>
                    Laravel Posts
                </div>

                <div class="mt-3">
                    <small style="opacity: 0.7;">
                    <p class="mb-3">
                    <span class="material-icons me-2" style="vertical-align: middle;">play_circle</span>
                    Special thanks to <strong>Codezilla YouTube Channel</strong> for the incredible tutorials!
                </p>                    </small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>