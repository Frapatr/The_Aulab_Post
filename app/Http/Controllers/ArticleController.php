<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Routing\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [ 
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser']),
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('article.create'); // 
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|unique:articles|min:5',
        'subtitle' => 'required|min:5',
        'body' => 'required|min:10',
        'image' => 'required|image',
        'category' => 'required',
    ]);
    $article = Article::create([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'body' => $request->body,
        // Salvataggio dell'immagine 
        'image' => $request->file('image')->store('images', 'public'),
        'category_id' => $request->category,
        'user_id' => Auth::user()->id,
    ]);
    return redirect(route('homepage'))->with('message', 'Articolo creato con successo');
    }
    
    public function index (){
         $articles = Article::orderBy('created_at', 'desc')->get();
          return view('article.index', compact('articles'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
    return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
