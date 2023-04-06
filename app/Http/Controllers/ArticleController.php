<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Va rediriger vers la page d'accueil du forum avec tous les articles
    public function index()
    {
        $articles = Article::with('language')->get();
        $languages = Language::all();

        return view('forum.index', ['articles' => $articles, 'languages' => $languages]);
    }

    // Va insérer dans la base de données un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'language_id' => 'required'
        ]);

        // Ajoute l'id de l'utilisateur connecté à la requête
        $id = Auth::user()->id;
        $request->all()['user_id'] = $id;

        $article = new Article;
        $article->fill($request->all());
        $article->save();

        return redirect()->route('forum');
    }

    // Va rediriger vers la page d'un article spécifique
    public function show(Article $article)
    {
        return view('forum.show', ['article' => $article]);
    }

    // Va rediriger vers la page de modification d'un article
    public function edit(Article $article)
    {
        return view('forum.edit', ['article' => $article]);
    }

    // Va insérer les informations modifiées de l'article dans la base de données
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $article->fill($request->all());
        $article->save();

        return back()->with('success', '');
    }

    // Va supprimer un article de la base de données
    public function delete(Article $article)
    {
        $article->delete();

        return redirect()->route('forum');
    }
}
