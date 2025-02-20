<x-app-layout>
    <h2 class="text-xl font-semibold">Modifier la Catégorie</h2>
    <form method="POST" action="{{ route('categories.update', $categorie) }}">
        @csrf @method('PUT')
        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $categorie->nom }}" required>
        <button type="submit">edit</button>
    </form>
</x-app-layout>
