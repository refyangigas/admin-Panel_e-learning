<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel E-Learning</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Learning Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.materials.index') }}">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pre-tests.index') }}">Pre Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.post-tests.index') }}">Post Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.videos.index') }}">Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.references.index') }}">Daftar Pustaka</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user-guides.index') }}">Petunjuk Pengguna</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
