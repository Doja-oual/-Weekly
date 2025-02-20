<x-app-layout>
<x-slot name="header">
        
    
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
        <h1 class="text-2xl font-bold mb-6">Créer un nouveau post</h1>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Titre -->
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-semibold mb-2">Titre</label>
                <input type="text" name="titre" id="titre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>

            <!-- Prix -->
            <div class="mb-4">
                <label for="prix" class="block text-gray-700 font-semibold mb-2">Prix </label>
                <input type="number" name="prix" id="prix" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Image </label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-700 font-semibold mb-2">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    
                        <option value="#">Categorie</option>
                
                </select>
            </div>

            <!-- Statut -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-semibold mb-2">Statut</label>
                <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="actif">Actif</option>
                    <option value="brouillon">Brouillon</option>
                    <option value="archivé">Archivé</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Créer le post
                </button>
            </div>
        </form>
    </div>
</div>

</x-slot>
</x-app-layout>