<?php

use App\Http\Controllers\BacklinksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::feeds();

Route::get('/', HomeController::class);
Route::get('/posts/{post:slug}', PostsController::class);
Route::get('/backlinks', BacklinksController::class);
//Route::get('/store', function() {
//    $content = file_get_contents(base_path('facades.md'));
//
//    \App\Models\Post::create([
//        'title' => 'Facades are singletons',
//        'slug' => 'facades-are-singletons',
//        'content' => $content,
//        'published_at' => now()
//    ]);
//});

Route::prefix('demos')->group(function () {
    Route::get('livewire-file-uploader', \App\Http\Livewire\FileUploader::class);
});
