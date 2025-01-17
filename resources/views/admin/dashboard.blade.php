<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            height: 100%;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3 class="text-center">Admin Panel</h3>
        <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('admin.materials.index') }}"><i class="fas fa-book"></i> Materials</a>
        <a href="{{ route('admin.pre-tests.index') }}"><i class="fas fa-file-alt"></i> Pre-Test</a>
        <a href="{{ route('admin.post-tests.index') }}"><i class="fas fa-clipboard-check"></i> Post-Test</a>
        <a href="{{ route('admin.videos.index') }}"><i class="fas fa-video"></i> Videos</a>
        <a href="{{ route('admin.references.index') }}"><i class="fas fa-link"></i> References</a>
        <a href="{{ route('admin.user-guides.index') }}"><i class="fas fa-info-circle"></i> User Guides</a>
    </div>

    <div class="content">
        <div class="header">
            <h4>Dashboard</h4>
            <a href="#" class="btn btn-light btn-sm">Logout</a>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Materials</h5>
                            <p class="card-text">Manage and organize training materials.</p>
                            <a href="{{ route('admin.materials.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pre-Test</h5>
                            <p class="card-text">Manage pre-test resources.</p>
                            <a href="{{ route('admin.pre-tests.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Post-Test</h5>
                            <p class="card-text">Manage post-test resources.</p>
                            <a href="{{ route('admin.post-tests.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Videos</h5>
                            <p class="card-text">Manage instructional videos.</p>
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">References</h5>
                            <p class="card-text">Manage learning references.</p>
                            <a href="{{ route('admin.references.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <h5 class="card-title">User Guides</h5>
                            <p class="card-text">Manage user guides.</p>
                            <a href="{{ route('admin.user-guides.index') }}" class="btn btn-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
