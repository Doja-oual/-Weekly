<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Titre et bouton Ajouter -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Liste des Catégories</h2>
            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Ajouter une Catégorie
            </a>
        </div>

        <!-- Tableau des catégories -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($categories as $category)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $category->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $category->nom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $category->slug }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-4">
                                <!-- Bouton Modifier -->
                                <a href="#" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                <!-- Formulaire Supprimer -->
                                <form action="#" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>