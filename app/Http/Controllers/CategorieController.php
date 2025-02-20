<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdatePostRequest;

class CategorieController extends Controller {
    // public function __construct() {
    //     $this->middleware('auth'); 
    // }

    public function index() {
        $categories = Categorie::paginate(10);
        return view('categories.index',['categories'=>$categories]);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(StoreCategorieRequest $request) {

        Categorie::create($request->validated()); 
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée.');
    }

    public function edit(Categorie $categorie) {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie) {
        $request->validate([
            'nom' => 'required|string|max:255|unique:categories,nom,' . $categorie->id,
        ]);

        $categorie->update([
            'nom' => $request->nom,
            'slug' => Str::slug($request->nom),
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(Categorie $categorie) {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
