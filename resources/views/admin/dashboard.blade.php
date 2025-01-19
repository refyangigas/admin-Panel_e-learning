@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="header">
            <h4>Dashboard</h4>
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
@endsection
