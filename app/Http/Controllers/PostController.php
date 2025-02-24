<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdatePostRequest;




class PostController extends Controller
{
    public function  show(){
        $posts = Post::paginate(10);
        return view('Poste.index',['posts'=>$posts]);


    }

    public function showe(Post $post)
    {
        $post->load('comments.user'); // Charge les commentaires avec les utilisateurs associés
        return view('poste.showe', compact('post'));
    }

    public function comment(StoreCommentRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('post.showe', $post->id)->with('success', 'Commentaire ajouté avec succès !');
    }

    public function index()
    {
        $posts = Post::paginate(9); 
        return view('Poste.post', compact('posts'));
    }
    public function create()
    {
        $categories = Categorie::all(); // Or use ->get() if you need specific fields
        return view('Poste.create', compact('categories'));
    }
    public function store(StorePostRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        // Création du post
        $post = Post::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'categorie_id' => $request->categorie_id,
            'status' => $request->status,
        ]);

        // Pas besoin de créer à nouveau, $post contient déjà le post créé
        return redirect(route('post'));
    }
    public function like(Post $post)
    {
        if ($post->likes()->where('user_id', Auth::id())->exists()) {
            $post->likes()->where('user_id', Auth::id())->delete();
        } else {
            $post->likes()->create(['user_id' => Auth::id()]);
        }
        return back();
    }

    public function update(UpdatePostRequest $request, $id) {
        $posts = Post::findOrFail($id);
        $posts->update($request->validated());
        return redirect()->route('Poste.index')->with('success', 'post mise à jour.');
    }
    public function destroy($id) {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect()->route('Poste.index')->with('success', 'post supprimée.');
    }
    public function edit($id) {
        $categories = Categorie::all();
        $posts = Post::findOrFail($id);
        return view('Poste.edit', compact('posts', 'categories'));
    }
}
