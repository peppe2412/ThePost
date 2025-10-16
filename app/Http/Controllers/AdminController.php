<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $title = 'Admin';
        $adminRequests = User::where(function ($query) {
            $query->where('is_admin', false)->orWhereNull('is_admin');
        })->whereNotNull('admin_request_at')->get();
        $revisorRequests =  User::where(function ($query) {
            $query->where('is_revisor', false)->orWhereNull('is_revisor');
        })->whereNotNull('revisor_request_at')->get();
        $writerRequests = User::where(function ($query) {
            $query->where('is_writer', false)->orWhereNull('is_writer');
        })->whereNotNull('writer_request_at')->get();
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests', 'title'));
    }

    public function setAdmin(User $user)
    {
        $user->update([
            'is_admin' => true,
            'admin_request_at' => null
        ]);
        $user->save();
        return redirect(route('admin-dashboard'))->with('message', "Hai reso $user->name amministratore");
    }

    public function setRevisor(User $user)
    {
        $user->update([
            'is_revisor' => true,
            'revisor_request_at' => null
        ]);
        $user->save();
        return redirect(route('admin-dashboard'))->with('message', "Hai reso $user->name revisore");
    }

    public function setWriter(User $user)
    {
        $user->update([
            'is_writer' => true,
            'writer_request_at' => null
        ]);
        $user->save();
        return redirect(route('admin-dashboard'))->with('message', "Hai reso $user->name redattore");
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ], [
            'name.required' => 'Campo richiesto',
            'name.unique' => 'Questa categoria è gia stata creata'
        ]);

        Category::create([
            'name' => strtolower($request->name)
        ]);

        return redirect()->back()->with('message', 'Categoria creata');
    }

    public function editCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ], [
            'name.required' => 'Campo richiesto',
            'name.unique' => 'Questa categoria è gia stata creata'
        ]);

        $category->update([
            'name' => strtolower($request->name)
        ]);

        return redirect()->back()->with('message', 'Categoria aggiornata');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Categoria eliminata');
    }

    public function editTag(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ], [
            'name.required' => 'Campo richiesto',
            'name.unique' => 'Questo tag è gia stato creato'
        ]);

        $tag->update([
            'name' => strtolower($request->name)
        ]);
        return redirect()->back()->with('message', 'Tag aggiornato');
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect()->back()->with('message', 'Tag eliminato');
    }
}
