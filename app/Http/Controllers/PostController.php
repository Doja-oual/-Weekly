<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;



class PostController extends Controller
{
    public function  show(){
        $posts = Post::paginate(10);
        return view('Poste.index',['posts'=>$posts]);


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
}
