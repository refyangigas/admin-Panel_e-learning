<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Admin\UserGuideController;
use App\Http\Controllers\Admin\PostTestController;
use App\Http\Controllers\Admin\PreTestController;
use App\Http\Controllers\Admin\MaterialController;

// Redirect root ke dashboard admin
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Routes Group - tanpa middleware auth
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Materials Management
        Route::resource('materials', MaterialController::class);

        // Pre-Test Management
        Route::resource('pre-tests', PreTestController::class);

        // Post-Test Management
        Route::resource('post-tests', PostTestController::class);

        // Video Management
        Route::resource('videos', VideoController::class);

        // References Management
        Route::resource('references', ReferenceController::class);

        // User Guide Management
        Route::resource('user-guides', UserGuideController::class);
    });

// Preview Routes
Route::prefix('preview')->name('preview.')->group(function () {
    Route::get('/materials/{material}', [MaterialController::class, 'preview'])->name('material');
    Route::get('/videos/{video}', [VideoController::class, 'preview'])->name('video');
    Route::get('/user-guide', [UserGuideController::class, 'preview'])->name('user-guide');
    Route::get('/references', [ReferenceController::class, 'preview'])->name('references');
});
