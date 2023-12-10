<?php

use App\Livewire\Author;
use App\Livewire\Book;
use App\Livewire\Category;
use App\Livewire\Dashboard;
use App\Livewire\IssueBook;
use App\Livewire\Publisher;
use App\Livewire\Report;
use App\Livewire\Student;
use App\Livewire\Setting;

use Illuminate\Support\Facades\Route;

//use App\Http\Livewire\Loign;
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

    Route::group(['prefix' => 'admin','middleware' =>['admin']], function () {
        Route::get('/author', Author::class)->name('author');
        Route::get('/category', Category::class)->name('category');
        Route::get('/publisher', Publisher::class)->name('publisher');
        Route::get('/student', Student::class)->name('students');
        Route::get('/book', Book::class)->name('book');

    });

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/issue-book', IssueBook::class)->name('issue_book');
    Route::get('/report', Report::class)->name('report');

    Route::get('/setting', Setting::class)->name('setting'); // ToDo


});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
//    Route::get('/', Loign::class)->name('login');
});
