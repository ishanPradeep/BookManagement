<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Author;
use App\Http\Livewire\Book;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Category;
use App\Http\Livewire\IssueBook;
//use App\Http\Livewire\Loign;
use App\Http\Livewire\Publisher;
use App\Http\Livewire\Report;
use App\Http\Livewire\Student;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/author', Author::class)->name('author');
    Route::get('/category', Category::class)->name('category');
    Route::get('/publisher', Publisher::class)->name('publisher');
    Route::get('/book', Book::class)->name('book');
    Route::get('/student', Student::class)->name('students');
    Route::get('/issue-book', IssueBook::class)->name('issue_book');
    Route::get('/report', Report::class)->name('report');


});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
//    Route::get('/', Loign::class)->name('login');
});
