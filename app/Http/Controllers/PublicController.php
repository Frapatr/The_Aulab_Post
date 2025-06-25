<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    public function homepage()
    {
        $articles = Article::where('is_accepted', true)
                            ->orderBy('created_at', 'desc')
                            ->take(4)
                            ->get();

        return view('welcome', compact('articles'));
    }


    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $userId = Auth::id();
        $user = User::find($userId);

        $role = $request->role;
        $info = [
            'role' => $request->role,
            'email' => $user->email,
            'message' => $request->message,
        ];

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail($info));

        $dataToUpdate = [];
        switch ($role) {
            case 'admin':
                $dataToUpdate['is_admin'] = NULL;
                break;
            case 'revisor':
                $dataToUpdate['is_revisor'] = NULL;
                break;
            case 'writer':
                $dataToUpdate['is_writer'] = NULL;
                break;
        }

        if (!empty($dataToUpdate)) {
            $user->update($dataToUpdate);
        }

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato! La tua candidatura è stata inviata.');
    }
}