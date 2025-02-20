<x-app-layout>
    <h2 class="text-xl font-semibold">Ajouter une Categorie</h2>
    <form method="POST" action="#">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required>
        <button type="submit">Ajouter</button>
    </form>
</x-app-layout>
