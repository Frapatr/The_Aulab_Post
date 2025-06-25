<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Articoli dell'utente in attesa di revisione
        $unrevisionedArticles = Article::where('user_id', $user->id)
                                        ->where('is_accepted', NULL)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
            
            // Articoli dell'utente accettati
            $acceptedArticles = Article::where('user_id', $user->id)
                                        ->where('is_accepted', true)
                                        ->orderBy('created_at', 'desc')
                                        ->get();

            // Articoli dell'utente rifiutati
            $rejectedArticles = Article::where('user_id', $user->id)
                                        ->where('is_accepted', false)
                                        ->orderBy('created_at', 'desc')
                                        ->get();

            return view('writer.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
        }
    }
