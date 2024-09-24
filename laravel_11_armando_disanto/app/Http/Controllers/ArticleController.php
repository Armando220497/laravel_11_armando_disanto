<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tags = Tag::all();

        return view('article.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione del form
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'body' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Caricamento dell'immagine
        $imagePath = $request->file('img')->store('images', 'public');

        // Creazione dell'articolo
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $imagePath,
        ]);



        $article->tags()->attach($request->tags);

        return redirect()->route('article.index')->with('message', 'Articolo inserito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)

    {
        $tags = Tag::all();
        return view('article.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if ($request->file('img')) {
            $img = $article->file('img')->store('public/img');
        } else {
            $img = $article->img;
        }

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $img
        ]);

        $article->tags()->sync($request->tags);

        return redirect(route('article.index'))->with('message', 'articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();

        $article->delete();
        return redirect()->back()->with("messsage", "articolo eliminato");
    }
}
