<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Titre et bouton Ajouter -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Liste des Posts</h2>
            <a href="{{ route('post.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Ajouter un Post
            </a>
        </div>

        <!-- Tableau des posts -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($posts as $post)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $post->titre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($post->description, 50) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $post->prix ? $post->prix . ' €' : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $post->status === 'actif' ? 'bg-green-100 text-green-800' : 
                                   ($post->status === 'brouillon' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $post->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-4">
                                <!-- Bouton Voir -->
                                <a href="#" class="text-blue-500 hover:text-blue-700">Voir</a>
                                <!-- Bouton Modifier -->
                                <a href="#" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                                <!-- Formulaire Supprimer -->
                                <form action="#" method="POST" onsubmit="return confirm('Supprimer ce post ?')">
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
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>