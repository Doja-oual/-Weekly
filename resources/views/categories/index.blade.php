<x-app-layout>
    <h2 class="text-xl font-semibold">Liste des Catégories</h2>
    <a href="#" class="btn btn-primary">Ajouter une Catégorie</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->nom }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="#">Modifier</a>
                <form action="#" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $categories->links() }}
</x-app-layout>
