<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard_layouts.home_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('myFiles', [FileController::class, 'index'])->name('file.index');
    Route::get('files', [FileController::class, 'anyFiles'])->name('file.allFiles');
    Route::get('files/add', [FileController::class, 'create'])->name('file.create');
    Route::post('files/upload', [FileController::class, 'store'])->name('file.store');
    Route::delete("delete/{id}", [FileController::class, 'destroy'])->name("file.destroy");
    Route::post("edit/{id}", [FileController::class, 'edit'])->name("file.edit");
    Route::post("update/{id}", [FileController::class, 'update'])->name("file.update");
    Route::get("show/{id}", [FileController::class, 'show'])->name("file.show");
});

Route::middleware("auth")->group(function () {
    Route::post("add/comment/{file}", [CommentController::class, "store"])->name("comment.store");
});

Route::middleware("auth")->group(function () {
    Route::post("add/like/{id}", [LikeController::class, "store"])->name("like.store");
});

Route::middleware("auth")->group(function () {
    Route::get("new/group", [GroupController::class, "create"])->name("group.create");
    Route::get("show/group", [GroupController::class, "index"])->name("group.index");
    Route::post("add/group", [GroupController::class, "store"])->name("group.store");
});


require __DIR__ . '/auth.php';
