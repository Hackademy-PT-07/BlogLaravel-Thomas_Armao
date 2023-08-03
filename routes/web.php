<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\AnimeController;



Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::get('/articoli', [ArticleController::class, 'articles'])->name('articles');

Route::get('/articolo/{id}', [ArticleController::class, 'article'])->name('article');

Route::get('/contatti', [ContactController::class, 'form'])->name('contacts');
Route::post('/contatti/save', [ContactController::class, 'save'])->name('contacts.save');


Route::get('/chi-siamo', [PageController::class, 'aboutUs'])->name('aboutUs');

Route::get('/anime/genres',[AnimeController::class, 'index'])->name('anime.index');
Route::get('/anime/genres/{id}',[AnimeController::class, 'animeByGenre'])->name('anime.byGenres');


Route::get('seeder', function() {

    App\Models\Article::create([
        'title' => 'Articolo 1',
        'category' => 'Esteri',
        'description' => 'Lorem ipsum dolor sit amet consectetur',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 2',
        'category' => 'Economia',
        'description' => 'Lorem ipsum dolor sit amet consectetur',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 3',
        'category' => 'Sport',
        'description' => 'Lorem ipsum dolor sit amet consectetur',
        'body' => '...',
    ]);

    App\Models\Article::create([
        'title' => 'Articolo 4',
        'category' => 'Politica',
        'description' => 'Lorem ipsum dolor sit amet consectetur',
        'body' => '...',
    ]);

});

Route::middleware('auth')->group(function(){
    Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index');

    Route::get('/account/articles', [App\Http\Controllers\ArticleController::class, 'indexAccount'])->name('account.articles');

    Route::get('/account/articles/{article}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('account.articles.edit');

    Route::put('/account/articles/{article}/update', [App\Http\Controllers\ArticleController::class, 'update'])->name('account.articles.update');

    Route::delete('/account/articles/{article}/delete', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('account.articles.destroy');

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
});

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::get('admin/users', function(){

    return view('admin.users');
});
