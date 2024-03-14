<?php

// view
use App\Http\Controllers\Liatbg;
use App\Http\Controllers\Cretcon;

    // Basic CRUD
    use App\Http\Controllers\edusKon;
    use App\Http\Controllers\upusKon;
    use App\Http\Controllers\delKon;

// Login and Auth
use App\Http\Controllers\konCol;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// get all data in homepage
// Route::get('/dash', [Liatbg::class, 'index'])->name('dash');

// Basic CRUD user
    Route::post('/post', [upusKon::class, 'insertData', 'index'])->name('post');
    Route::get('/create', [Cretcon::class, 'index'])->name('create');

        // kolom edit, delete
        Route::get('/edit/{id}', [edusKon::class, 'see'])->name('edit');
        Route::patch('/update/{id}', [edusKon::class, 'edus'])->name('up');
        Route::delete('/delete/{id}', [delKon::class, 'delus'])->name('delete');

// Login and Auth
Route::get('/', [konCol::class, 'index'])->name('formlog');
Route::patch('/home', [konCol::class, 'masuk'])->name('masuk');


