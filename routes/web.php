<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserQuestionController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Route::get('/contact', function () {
    //     return view('layouts.contact');
    // })->name('contact');
    Route::get('/testjson', function () {
        return view('testjson');
    })->name('testjson');
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Ouiz
    Route::get('/quiz/{subject_id}', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz_index/{subject_id}', [QuizController::class, 'quiz_index_question'])->name('quiz.index.question');
    Route::post('/quiz_store/{id}', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/quiz_over/{id}', [QuizController::class, 'over'])->name('quiz.over');

    //Quiz Section
    Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/question/create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::get('/question/delete/{id}', [QuestionController::class, 'destroy'])->name('question.delete');
    Route::post('/question/update/{id}', [QuestionController::class, 'update'])->name('question.update');
    Route::get('/question/search/{id}/{id1}', [QuestionController::class, 'search'])->name('question.search');

    //Subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::get('/subject/delete/{id}', [SubjectController::class, 'destroy'])->name('subject.delete');
    Route::post('/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');

    //Game Play
    Route::get('/gameplay/index/{id}', [UserQuestionController::class, 'index'])->name('gameplay.index')->middleware('auth');
    Route::post('/gameplay/store/{id}', [UserQuestionController::class, 'store'])->name('gameplay.store');
    Route::get('/gameplay/over/{id}', [UserQuestionController::class, 'over'])->name('gameplay.over');
    Route::get('/gameplay', [UserQuestionController::class, 'choose'])->name('gameplay.choose');
    Route::get('/gameplay/control/{id}', [UserQuestionController::class, 'controlAuto'])->name('gameplay.controlauto');

    //User
    Route::get('/user', [UsersController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/user', [UsersController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [UsersController::class, 'destroy'])->name('user.delete');
    Route::post('/user/update/{id}', [UsersController::class, 'update'])->name('user.update');

    //Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/store', [ContactController::class, 'store'])->name('contact.store');

});

require __DIR__ . '/auth.php';
