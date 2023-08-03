<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Article;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{

    public function __construct()
    {
    }

    function articles()
    {

        $title = 'Articoli';

        $subtitle = 'Lorem ipsum dolor sit amet consectetur';

        $articles = Article::all();

        return view('articoli.articoli', compact('title', 'subtitle', 'articles'));
    }

    public function indexAccount()
    {
        $articles = auth()->user()->articles;

        return view('account.articles.index', compact('articles'));
    }

    public function editAccount(Article $article)
    {
        if($article->user_id != auth()->user()->id) {
            abort(403);
        }

        return "FORM DI EDIT: stai modificando l'articolo $article->title di {$article->user->name}";
    }

    

    

    public function article($id)
    {

        $article = Article::findOrFail($id);

        return view('articoli.articolo', compact('article'));
    }

    public function create()
    {
        
        return view('account.articles.create');
    }

    public function store(StoreArticleRequest $request)
    {

        $article = Article::create(array_merge($request->all(), ['user_id' => auth()->user()->id]));

        $article->categories()->attach($request->categories);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            //$fileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->extension();
            $randomFileName = uniqid('article_image_') . ".$extension";
            //$urlSafeFileName = \Illuminate\Support\Str::slug($fileName) . ".$extension";
            

            $imagePath = $request->file('image')->storeAs('public/images/' . $article->id, $randomFileName);

            $article->image = $imagePath;

            $article->save();

        }

        return redirect()->back()->with(['success' => 'Articolo creato correttamente.']);
        
    }

    public function edit(Article $article)
    {
        return view('account.articles.edit', compact('article'));
    }

    public function update(StoreArticleRequest $request, Article $article){
        
        if($article->user_id != auth()->user()->id) {
            abort(403);
        }

        $article->fill($request->all())->save();
        // metodo alternativo
        // $article->update($request->all());
        $article->categories()->detach();
        $article->categories()->attach($request->categories);

        return redirect()->back()->with(['success'=>'Articolo modificato correttamente']);
    }

    public function destroy(Article $article){
        
        if($article->user_id != auth()->user()->id) {
            abort(403);
        }
        
        $article->categories()->detach();

        $article->delete();

        return redirect()->back()->with(['success' => 'Articolo cancellato']);
    }

}
