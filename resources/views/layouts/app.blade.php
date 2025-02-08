<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>សាលាបឋមសិក្សាតាម៉ា</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon_io/favicon.ico') }}">
    <link rel="shortcut icon" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="shortcut icon" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" href="{{ asset('favicon_io/android-chrome-512x512.png') }}" sizes="512x512">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @font-face {
            font-family: 'Khmer OS Battambang';
            src: url("{{ asset('fonts/Khmer-OS-BTB.ttf') }}") format('truetype');
        }
        
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #f8fafc;
            --accent: #3b82f6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --navbar-height: 74px;
        }

        body {
            font-family: 'Khmer OS Battambang', 'Inter', sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            padding: 0.75rem 1.5rem;
            height: var(--navbar-height);
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--gray-800) !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .nav-link {
            color: var(--gray-700) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
            background-color: var(--gray-50);
        }

        .navbar .badge {
            font-weight: 500;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            border-radius: 0.5rem;
            padding: 0.5rem;
        }

        .dropdown-item {
            color: var(--gray-700) !important;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
        }

        .dropdown-item:hover {
            background-color: var(--gray-50);
            color: var(--primary) !important;
        }

        .dropdown-item i {
            color: var(--gray-400);
            margin-right: 0.5rem;
        }

        /* Left Menu Styles */
        .sidebar {
            background-color: white;
            border-right: 1px solid var(--gray-200);
            padding: 1.5rem 1rem;
            height: calc(100vh - 64px);
            position: fixed;
            top: 64px;
            left: 0;
            width: 280px;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--gray-600) !important;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover, 
        .sidebar .nav-link.active {
            background-color: var(--gray-50);
            color: var(--primary) !important;
        }

        .sidebar .nav-link i {
            font-size: 1.25rem;
            color: var(--gray-400);
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: calc(100vh - var(--navbar-height));
            margin-top: var(--navbar-height);
        }

        /* Card Styles */
        .card {
            background-color: white;
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--gray-200);
            padding: 1.25rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                height: calc(100vh - var(--navbar-height));
                top: var(--navbar-height);
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                z-index: 1000;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('favicon_io/school.png') }}" alt="School Logo">
                    <span>សាលាបឋមសិក្សាតាម៉ា</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        @php
                            $latest_school_session = \App\Models\SchoolSession::latest()->first();
                            $current_school_session_name = $latest_school_session ? $latest_school_session->session_name : null;
                        @endphp
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                @if (session()->has('browse_session_name') && session('browse_session_name') !== $current_school_session_name)
                                    <span class="nav-link text-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i> Browsing Session: {{ session('browse_session_name') }}
                                    </span>
                                @elseif($latest_school_session)
                                    <span class="nav-link text-success">
                                        <i class="fas fa-check-circle me-2"></i> Current Session: {{ $current_school_session_name }}
                                    </span>
                                @else
                                    <span class="nav-link text-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i> No Active Session
                                    </span>
                                @endif
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="badge bg-primary-subtle text-primary me-2">{{ ucfirst(Auth::user()->role) }}</span>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('password.edit') }}">
                                        <i class="fas fa-key"></i> Change Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('layouts.left-menu')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>