<?php


use App\Http\Controllers\{
    UserController,
    DonorsController,
    LoginController,
    LogoutController,
};
use Illuminate\Support\Facades\Route;

    /**
    * Home Routes
    */
    Route::get('/', function () {
        return view('landing');
    });

    /*
    * Donors Routes
    */
    Route::get('/donors/delete/{id}', [DonorsController::class, 'destroy'])->name('donors.destroy');
    Route::put('/donors/{id}', [DonorsController::class, 'update'])->name('donors.update');
    Route::get('/donors/{id}/edit', [DonorsController::class, 'edit'])->name('donors.edit');
    Route::get('/donors', [DonorsController::class, 'index'])->name('donors.index');
    Route::get('/donors/create', [DonorsController::class, 'create'])->name('donors.create');
    Route::post('/donors', [DonorsController::class, 'store'])->name('donors.store');
    Route::post('/donors/save', [DonorsController::class, 'save'])->name('donors.save');
    Route::get('/export', [DonorsController::class, 'export'])->name('donors.export');

    /**
    * Dashboard Routes
    */
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


    /**
    * Login Routes
    */
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');

    /**
    * Logout Routes
    */
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



