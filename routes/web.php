<?php


use Illuminate\Support\Facades\Route;

// ===================================
// ========= PUBLIC ROUTE ============
// ===================================
Route::get('/', 'App\Http\Controllers\ViewController@landing')
    ->name('landing');


// ===================================
// ===== AUTHENTICATION ROUTES =======
// ===================================
// LOGIN PAGE ROUTE
Route::get('/login', 'App\Http\Controllers\ViewController@login')
    ->name('login');
// REGISTER PAGE ROUTE
Route::get('/register', 'App\Http\Controllers\ViewController@register')
    ->name('register');
// LOGIN POST
Route::post('/login', 'App\Http\Controllers\AuthController@loginPost')
    ->name('login.post');
// REGISTER POST
Route::post('/register', 'App\Http\Controllers\AuthController@registerPost')
    ->name('register.post');
// LOGOUT
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')
    ->name('logout');

// ====================================
// ========== USER REQUESTS ===========
// ====================================
// user
 Route::get('/user', 'App\Http\Controllers\ViewController@user')->name('user');

// Views
Route::get('/admin', 'App\Http\Controllers\ViewController@adminDashboard')->name('admin-dashboard');
 Route::get('/admin/genre', 'App\Http\Controllers\ViewController@adminGenre')->name('admin.genre');
 Route::get('/admin/project/rr', 'App\Http\Controllers\ViewController@adminRR')->name('admin-rr');
 Route::get('/admin/project/ra', 'App\Http\Controllers\ViewController@adminRA')->name('admin-ra');
Route::get('/admin/project/rtp', 'App\Http\Controllers\ViewController@adminRTP')->name('admin-rtp');
 Route::get('/admin/project/all', 'App\Http\Controllers\ViewController@adminAll')->name('admin-all');









Route::middleware('user')->group(function () {
    Route::get('/user', 'App\Http\Controllers\ViewController@user')
        ->name('user');
});

// Route::middleware('')->group(function () {
Route::get('/admin', 'App\Http\Controllers\ViewController@adminDashboard')
    ->name('admin');

Route::get('/admin/user-management', 'App\Http\Controllers\Admin\UserManagementController@view')
    ->name('user-management');

  // routes/web.php




    
    

  
    use App\Http\Controllers\Admin\AdminThreatController;

    Route::resource('admin/profile/threats', AdminThreatController::class)
    ->names([
        'index' => 'admin.profile.threats.index',
        'create' => 'threats.create',
        'store' => 'threats.store',
        'edit' => 'admin.profile.threats.edit',
        'update' => 'admin.profile.threats.update',
        'destroy' => 'admin.profile.threats.destroy',
    ]);




// Route::get('/admin', 'App\Http\Controllers\ViewController@adminDashboard')
//     ->name('admin');

// Route::get('/admin/projects', 'App\Http\Controllers\Admin\ProjectController@view')
//     ->name('admin.projects');

// Route::post('/admin/projects/create', 'App\Http\Controllers\Admin\ProjectController@create')
//     ->name('admin.projects.create');

// Route::get('/admin/user-management', 'App\Http\Controllers\Admin\UserManagementController@view')
//     ->name('user-management');


// ====================================
// Standardized Routing Structure
// ====================================
use App\Http\Controllers\Admin\OrganizationController;


Route::get('/admin/Organization', [OrganizationController::class, 'index']);
Route::post('/admin/organizations', [OrganizationController::class, 'store'])->name('organizations.store');
Route::resource('/admin/organizations', OrganizationController::class);
Route::put('/admin/organizations/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
Route::get('/admin/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
Route::put('/admin/organizations/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
Route::get('/admin/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
Route::delete('/admin/organizations/{organization}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');
Route::get('/admin/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
Route::resource('/admin/organizations', OrganizationController::class);
Route::get('/admin/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');









// routes/web.php

/* use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 */



// ====================================

use App\Http\Controllers\Admin\ProjectController;

Route::get('/admin/projects', [ProjectController::class, 'view'])->name('admin.projects');
Route::post('/admin/projects', [ProjectController::class, 'create'])->name('admin.projects.create');
Route::patch('/admin/projects/{id}/update', [ProjectController::class, 'update'])->name('admin.projects.update');


use App\Http\Controllers\ThreatGroupController;
use App\Http\Controllers\ThreatController;

Route::prefix('user/profile/threats')->group(function() {
    Route::get('/', [ThreatController::class, 'index'])->name('threats.index');
    Route::get('/create', [ThreatController::class, 'create'])->name('threats.create');
    Route::post('/', [ThreatController::class, 'store'])->name('threats.store');
    Route::get('/{threat}/edit', [ThreatController::class, 'edit'])->name('threats.edit');
    Route::put('/{threat}', [ThreatController::class, 'update'])->name('threats.update');
    Route::delete('/{threat}', [ThreatController::class, 'destroy'])->name('threats.destroy');

    // Threat Group management
    Route::get('/groups/create', [ThreatGroupController::class, 'create'])->name('threat-groups.create');
    Route::post('/groups', [ThreatGroupController::class, 'store'])->name('threat-groups.store');
    Route::get('/groups/{group}/edit', [ThreatGroupController::class, 'edit'])->name('threat-groups.edit');
    Route::put('/groups/{group}', [ThreatGroupController::class, 'update'])->name('threat-groups.update');
    Route::delete('/groups/{group}', [ThreatGroupController::class, 'destroy'])->name('threat-groups.destroy');



});

use App\Http\Controllers\VulnerabilityController;
use App\Http\Controllers\VulnerabilityGroupController;

Route::prefix('user/profile/Vulnerability')->group(function() {
    Route::get('/', [VulnerabilityController::class, 'index'])->name('vulnerabilities.index');
    Route::get('/create', [VulnerabilityController::class, 'create'])->name('vulnerabilities.create');
    Route::post('/', [VulnerabilityController::class, 'store'])->name('vulnerabilities.store');
    Route::get('/{vulnerability}/edit', [VulnerabilityController::class, 'edit'])->name('vulnerabilities.edit');
    Route::put('/{vulnerability}', [VulnerabilityController::class, 'update'])->name('vulnerabilities.update');
    Route::delete('/{vulnerability}', [VulnerabilityController::class, 'destroy'])->name('vulnerabilities.destroy');

    // Vulnerability Group management
    Route::get('/groups/create', [VulnerabilityGroupController::class, 'create'])->name('vulnerability-groups.create');
    Route::post('/groups', [VulnerabilityGroupController::class, 'store'])->name('vulnerability-groups.store');
    Route::get('/groups/{group}/edit', [VulnerabilityGroupController::class, 'edit'])->name('vulnerability-groups.edit');
    Route::put('/groups/{group}', [VulnerabilityGroupController::class, 'update'])->name('vulnerability-groups.update');
    Route::delete('/groups/{group}', [VulnerabilityGroupController::class, 'destroy'])->name('vulnerability-groups.destroy');
});