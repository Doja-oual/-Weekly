<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Liste des Catégories</h2>
           <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Ajouter une catégorie
                </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($categories as $category)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $category->nom }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-4">
                                <!-- Bouton Modifier -->
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                <!-- Formulaire Supprimer -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
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