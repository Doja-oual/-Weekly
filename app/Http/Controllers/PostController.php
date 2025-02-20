<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;



class PostController extends Controller
{
    public function  index(){
        $posts = Post::paginate(10);
        return view('Poste.index',['posts'=>$posts]);


    }
    public function create(){
        return view('Poste.create');
    }
    public function store(StorePostRequest  $request){
        
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
        $newPost= Post::create($post);
        return redirect(route('post'));
    }
}
