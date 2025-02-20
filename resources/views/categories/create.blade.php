<x-app-layout>
<x-slot name="header">
        
    
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
        <h1 class="text-2xl font-bold mb-6">Créer un categorie</h1>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Titre -->
            <div class="mb-4">
                <label for="titre" class="block text-gray-700 font-semibold mb-2">nom</label>
                <input type="text" name="titre" id="titre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

                <!-- Bouton de soumission -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Créer le categorie
                </button>
            </div>
        </form>
    </div>
</div>

</x-slot>
</x-app-layout>