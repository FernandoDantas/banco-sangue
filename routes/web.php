<?php


use App\Http\Controllers\{
    ProfileController,
    BloodTypesController,
    UserController,
    DonorsController,
    GranteesController,
    LoginController,
    LogoutController,
    StateController,
    WardsController,
};
use Illuminate\Support\Facades\Route;

    /**
    * Home Routes
    */
    Route::get('/', function () {
        return view('landing');
    });


    /**
    * Dashboard Routes
    */

    /**
     * Routes Profiles
     */
    Route::resource('profiles', ProfileController::class);

    /**
     * Users routes
     */
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

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

    /*
    * Grantees Routes
    */
    Route::get('/grantees/delete/{id}', [GranteesController::class, 'destroy'])->name('grantees.destroy');
    Route::put('/grantees/{id}', [GranteesController::class, 'update'])->name('grantees.update');
    Route::get('/grantees/{id}/edit', [GranteesController::class, 'edit'])->name('grantees.edit');
    Route::get('/grantees', [GranteesController::class, 'index'])->name('grantees.index');
    Route::get('/grantees/create', [GranteesController::class, 'create'])->name('grantees.create');
    Route::get('/help', [GranteesController::class, 'help'])->name('grantees.help');
    Route::post('/grantees', [GranteesController::class, 'store'])->name('grantees.store');
    Route::post('/grantees/save', [GranteesController::class, 'save'])->name('grantees.save');


    /*
    * States Routes
    */
    Route::get('/states/delete/{id}', [StateController::class, 'destroy'])->name('states.destroy');
    Route::put('/states/{id}', [StateController::class, 'update'])->name('states.update');
    Route::get('/states/{id}/edit', [StateController::class, 'edit'])->name('states.edit');
    Route::get('/states', [StateController::class, 'index'])->name('states.index');
    Route::get('/states/create', [StateController::class, 'create'])->name('states.create');
    Route::post('/states', [StateController::class, 'store'])->name('states.store');

     /*
    * Wards Routes
    */
    Route::get('/wards/delete/{id}', [WardsController::class, 'destroy'])->name('wards.destroy');
    Route::put('/wards/{id}', [WardsController::class, 'update'])->name('wards.update');
    Route::get('/wards/{id}/edit', [WardsController::class, 'edit'])->name('wards.edit');
    Route::get('/wards', [WardsController::class, 'index'])->name('wards.index');
    Route::get('/wards/create', [WardsController::class, 'create'])->name('wards.create');
    Route::post('/wards', [WardsController::class, 'store'])->name('wards.store');

    /*
    * Blood Types Routes
    */
    Route::get('/types/delete/{id}', [BloodTypesController::class, 'destroy'])->name('types.destroy');
    Route::put('/types/{id}', [BloodTypesController::class, 'update'])->name('types.update');
    Route::get('/types/{id}/edit', [BloodTypesController::class, 'edit'])->name('types.edit');
    Route::get('/types', [BloodTypesController::class, 'index'])->name('types.index');
    Route::get('/types/create', [BloodTypesController::class, 'create'])->name('types.create');
    Route::post('/types', [BloodTypesController::class, 'store'])->name('types.store');


    /**
    * Login Routes
    */
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');

    /**
    * Logout Routes
    */
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



