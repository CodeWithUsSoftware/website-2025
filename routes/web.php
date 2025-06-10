<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});
Route::get('/', [\App\Http\Controllers\TopicController::class, 'getTopicSpotLight'])->name('home');

Route::view('/pricing', 'pricing');
Route::view('/student_spotlight', 'student_spotlight');
Route::view('/faqs', 'faqs');
Route::view('/topic/artificial-intelligence', 'ai_course');
Route::view('/monthly-subscriptions', 'monthly-subscriptions');
Route::view('/school-program', 'school-program');
Route::view('/partner', 'partner');
Route::view('/camps', 'camps');
Route::view('/coding_classes', 'coding_classes');
Route::view('/phone-call', 'phone-call');
Route::view('/reschedule', 'reschedule');
Route::view('/sitemap', 'sitemap');
Route::view('/computer-science-standards/index', 'computer-science-standards/index');
Route::view('/contact', 'contact-us');
Route::view('/how-to-videos', 'how_to_videos');

Route::get('student_spotlight', [\App\Http\Controllers\TopicController::class, 'getSpotLight']);
Route::get('/student-spotlight-video', [\App\Http\Controllers\StudentSpotLightController::class, 'getStudentSpotlightVideos']);
Route::get('/topics/{slug}', [\App\Http\Controllers\TopicController::class, 'getTopicsSlug']);
Route::get('/jobs', [\App\Http\Controllers\JobsController::class, 'index']);
Route::get('/jobs/{slug}', [\App\Http\Controllers\JobsController::class, 'show'])->name('show.jobs');

Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'latestBlogsAll']);
Route::get('/blogs/{slug}', [\App\Http\Controllers\BlogController::class, 'getBlogAll'])->name('blogs');
// Route::get('/blogs/categories', [\App\Http\Controllers\BlogCategoryController::class, 'blogCategories'])->name('categories.index');
Route::get('/blogs/categories/{slug}', [\App\Http\Controllers\BlogController::class, 'blogCategoryAll']);
Route::get('/blogs/categories/{category}/{slug}', [\App\Http\Controllers\BlogController::class, 'blogCategory']);
Route::get('/blogs/tags/{slug}', [\App\Http\Controllers\BlogController::class, 'blogTagAll']);
Route::get('/blogs/tags/{category}/{slug}', [\App\Http\Controllers\BlogController::class, 'blogCategory']);
Route::get('/blogs/locations/{slug}', [\App\Http\Controllers\BlogController::class, 'blogLocationAll']);
Route::get('/blogs/locations/{category}/{slug}', [\App\Http\Controllers\BlogController::class, 'blogCategory']);

Route::get('/sitemap', [\App\Http\Controllers\WebsiteBaseController::class, 'initialWebsiteData']);
Route::get('/how-to-videos', [\App\Http\Controllers\WebsiteBaseController::class, 'howToVideos']);
Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'projects']);
Route::get('/view-project/{id}', [\App\Http\Controllers\ProjectController::class, 'view_project']);
Route::get('/web-project/{id}', [\App\Http\Controllers\ProjectController::class, 'web_project']);
Route::get('/view-project-code/{id}', [\App\Http\Controllers\ProjectController::class, 'view_project_code']);
Route::get('/referral_link/{code}', [\App\Http\Controllers\ReferralController::class, 'referralLink']);
Route::get('/categories/{category}', [\App\Http\Controllers\LandingPageController::class, 'getLandingPageCategory']);
Route::get('/computer-science-standards/united-states', [\App\Http\Controllers\SchoolPageController::class, 'allCountries']);
Route::get('/computer-science-standards/united-states/{slug}', [\App\Http\Controllers\SchoolPageController::class, 'schoolPages']);


Route::redirect('/en/faqs', '/faqs');
