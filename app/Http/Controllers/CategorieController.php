<?php
namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

class CategorieController extends Controller {
    public function index() {
        $categories = Categorie::paginate(10);
        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(StoreCategorieRequest $request) {
        Categorie::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée.');
    }

    public function edit($id) {
        $categorie = Categorie::findOrFail($id);
        return view('categories.edit', compact('categorie'));
    }

    public function update(UpdateCategorieRequest $request, $id) {
        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }
    public function destroy($id) {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}