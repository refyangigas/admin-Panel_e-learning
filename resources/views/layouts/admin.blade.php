<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin E-Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Base Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F8FAFC;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Mobile Navbar */
        .mobile-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(135deg, #0EA5E9 0%, #2563EB 100%);
            z-index: 1001;
            display: none;
            align-items: center;
            padding: 0 15px;
            justify-content: space-between;
        }

        .mobile-menu-btn {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 10px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            width: 280px;
            height: 100vh;
            background: white;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .logo-section {
            background: linear-gradient(135deg, #0EA5E9 0%, #2563EB 100%);
            height: 70px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            color: white;
        }

        .logo-box {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 12px;
            backdrop-filter: blur(4px);
        }

        .nav-item {
            color: #1E293B;
            padding: 12px 24px;
            margin: 4px 16px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .nav-item:hover {
            background: #F1F5F9;
            color: #0EA5E9;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: #EEF2FF;
            color: #0EA5E9;
            font-weight: 600;
        }

        .nav-item i {
            margin-right: 12px;
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
            color: #0EA5E9;
        }

        .nav-section-title {
            padding: 12px 28px;
            margin-top: 5px;
            color: #64748B;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            padding: 90px 24px 24px;
            min-height: 100vh;
            transition: all 0.3s ease;
            background: #F8FAFC;
        }

        .top-header {
            position: fixed;
            top: 0;
            left: 280px;
            right: 0;
            height: 70px;
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            z-index: 998;
            display: flex;
            align-items: center;
            padding: 0 30px;
        }

        .user-welcome {
            margin-left: auto;
            display: flex;
            align-items: center;
            background: #F1F5F9;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 0.95rem;
            color: #64748B;
        }

        .content-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1), 0 1px 2px rgba(0,0,0,0.06);
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .mobile-navbar {
                display: flex;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding-top: 80px;
            }

            .top-header {
                left: 0;
            }

            .user-welcome {
                display: none;
            }
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 999;
        }

        .overlay.show {
            display: block;
        }

        @media (max-width: 576px) {
            .nav-item {
                padding: 10px 20px;
                margin: 2px 12px;
            }

            .content-card {
                padding: 16px;
                border-radius: 12px;
            }
        }
    </style>
</head>
<body x-data="{ sidebarOpen: false }">
    <!-- Mobile Navbar -->
    <div class="mobile-navbar">
        <button @click="sidebarOpen = !sidebarOpen" class="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </button>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div class="logo-box">
                <i class="fas fa-graduation-cap" style="color: white; font-size: 1.4rem;"></i>
            </div>
            <div style="display: flex; flex-direction: column; line-height: 1.1;">
                <span style="font-size: 1rem; font-weight: 600; color: white;">SMART</span>
                <span style="font-size: 0.75rem; opacity: 0.9; color: white;">E-Learning</span>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 8px;">
            <div style="width: 8px; height: 8px; background: #10B981; border-radius: 50%;"></div>
            <span style="color: white; font-size: 0.8rem;">Online</span>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" x-show="sidebarOpen" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <nav class="sidebar" :class="{ 'show': sidebarOpen }">
        <div class="logo-section">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div class="logo-box">
                    <i class="fas fa-graduation-cap" style="color: white; font-size: 1.8rem;"></i>
                </div>
                <div style="display: flex; flex-direction: column; line-height: 1.1;">
                    <span style="font-size: 1.2rem;">SMART</span>
                    <span style="font-size: 0.85rem; opacity: 0.9;">E-Learning</span>
                </div>
            </div>
        </div>

        <div class="nav flex-column" style="padding-top: 15px;">
            <!-- Main Menu -->
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <i class="fas fa-home"></i> Dashboard
            </a>

            <div class="nav-section-title">Main Menu</div>
            
            <a href="{{ route('admin.materials.index') }}" class="nav-item">
                <i class="fas fa-book"></i> Materi
            </a>
            <a href="{{ route('admin.pre-tests.index') }}" class="nav-item">
                <i class="fas fa-clipboard-check"></i> Pre Test
            </a>
            <a href="{{ route('admin.post-tests.index') }}" class="nav-item">
                <i class="fas fa-tasks"></i> Post Test
            </a>

            <div class="nav-section-title">Media & Resources</div>
            
            <a href="{{ route('admin.videos.index') }}" class="nav-item">
                <i class="fas fa-video"></i> Video
            </a>
            <a href="{{ route('admin.references.index') }}" class="nav-item">
                <i class="fas fa-book-open"></i> Daftar Pustaka
            </a>
            <a href="{{ route('admin.user-guides.index') }}" class="nav-item">
                <i class="fas fa-question-circle"></i> Petunjuk Pengguna
            </a>
        </div>
    </nav>

    <!-- Top Header -->
    <header class="top-header">
        <div class="user-welcome">
            <i class="fas fa-user-circle" style="color: #0EA5E9; margin-right: 8px; font-size: 1.1rem;"></i>
            Welcome back, Admin
            <span style="width: 6px; height: 6px; border-radius: 50%; display: inline-block; margin-left: 8px; background: #10B981; box-shadow: 0 0 10px #10B981;"></span>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <div style="display: flex; align-items: center; margin-bottom: 24px;">
                <h1 style="font-size: 1.5rem; font-weight: 600; color: #1E293B; margin: 0;">Dashboard Overview</h1>
            </div>
            <div class="content-card">
                @yield('content')
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current nav item
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-item').forEach(link => {
                if (link.getAttribute('href').includes(currentPath)) {
                    link.classList.add('active');
                }
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                const sidebar = document.querySelector('.sidebar');
                const toggleBtn = document.querySelector('.mobile-menu-btn');
                
                if (window.innerWidth <= 992) {
                    if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });
        });
    </script>
</body>
</html>