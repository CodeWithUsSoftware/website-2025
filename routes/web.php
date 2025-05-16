<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});

// Route::get('/', function () {return view('index');});
Route::get('/', [\App\Http\Controllers\TopicController::class, 'getTopicSpotLight'])->name('home');

Route::view('/pricing', 'pricing');
Route::view('/student_spotlight', 'student_spotlight');

Route::get('student_spotlight', [\App\Http\Controllers\TopicController::class, 'getSpotLight']);
Route::get('/student-spotlight-video', [\App\Http\Controllers\StudentSpotLightController::class, 'getStudentSpotlightVideos']);
