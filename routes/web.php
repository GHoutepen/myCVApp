<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('gem', [HomeController::class, 'gem'])->name('gem');
Route::get('cv', [HomeController::class, 'cv'])->name('cv');
Route::get('hobby', [HomeController::class, 'hobby'])->name('hobby');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    //blog crud bit

    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blogs/{blog}/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}/destroy', [BlogController::class, 'destroy'])->name('blogs.destroy');


    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
});

//public blogs
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');


Route::get('/_debug/db', function () {
    $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table'");

    $result = [];

    foreach ($tables as $table) {
        $name = $table->name;
        $rows = DB::table($name)->limit(50)->get();
        $result[$name] = $rows;
    }

    return response()->json($result);
});

require __DIR__.'/settings.php';
