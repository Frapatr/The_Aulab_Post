<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect(route('admin.dashboard'))->with('message', "L'utente {$user->name} è ora un amministratore.");
    }

    public function setRevisor(User $user)
    {
        $user->update(['is_revisor' => true]);
        return redirect(route('admin.dashboard'))->with('message', "L'utente {$user->name} è ora un revisore.");
    }

    public function setWriter(User $user)
    {
        $user->update(['is_writer' => true]);
        return redirect(route('admin.dashboard'))->with('message', "L'utente {$user->name} è ora un redattore.");
    }

    public function storeCategory(Request $request)
    {
        Category::create(['name' => Str::lower($request->name)]);
        return redirect(route('admin.dashboard'))->with('message', 'Categoria creata con successo.');
    }

    public function editCategory(Request $request, Category $category)
    {
        $category->update(['name' => Str::lower($request->name)]);
        return redirect(route('admin.dashboard'))->with('message', 'Categoria aggiornata con successo.');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Categoria eliminata con successo.');
    }

    public function editTag(Request $request, Tag $tag)
    {
        $tag->update(['name' => Str::lower($request->name)]);
        return redirect(route('admin.dashboard'))->with('message', 'Tag aggiornato con successo.');
    }

    public function deleteTag(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message', 'Tag eliminato con successo.');
    }
}