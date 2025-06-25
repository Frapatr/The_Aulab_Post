<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }
    
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
    
    public function create()
    {
        return view('article.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'required|image',
            'category' => 'required',
            'tags' => 'required', 
        ]);

        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $request->file('image')->store('images', 'public'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);

        // Gestione dei tags
        $tags = explode(',', $request->tags);
        
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => Str::lower(trim($tag))], 
                ['name' => Str::lower(trim($tag))]
            );
            $article->tags()->attach($newTag); 
        }

        return redirect(route('homepage'))->with('message', 'Articolo creato con successo, ora è in attesa di revisione.');
    }
    public function edit(Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('homepage')->with('alert', 'Accesso non consentito.');
        }

        return view('article.edit', compact('article'));
    }

    /**
     * Aggiorna un articolo esistente nel database.
     */
    public function update(Request $request, Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('homepage')->with('alert', 'Accesso non consentito.');
        }

        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category,
            'is_accepted' => NULL, // L'articolo torna in revisione
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($article->image); // Cancella la vecchia immagine
            $newImage = $request->file('image')->store('images', 'public');
            $article->update(['image' => $newImage]);
        }

        $tags = explode(',', $request->tags);
        $newTags = [];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => Str::lower(trim($tag))],
                ['name' => Str::lower(trim($tag))]
            );
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags); // Sincronizza i tag

        return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo, è stato rimandato in revisione.');
    }

    /**
     * Cancella un articolo dal database.
     */
    public function destroy(Article $article)
    {
        if (Auth::user()->id !== $article->user_id) {
            return redirect()->route('homepage')->with('alert', 'Accesso non consentito.');
        }

        Storage::delete($article->image); // Cancella l'immagine associata
        $article->tags()->detach(); // Scollega tutti i tag
        $article->delete(); // Cancella l'articolo

        return redirect(route('writer.dashboard'))->with('message', 'Articolo cancellato con successo.');
    }
}


