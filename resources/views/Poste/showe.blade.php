<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Détails du post -->
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Image -->
            <div class="w-full h-96 bg-gray-200">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->titre }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-500">
                        Pas d'image
                    </div>
                @endif
            </div>

            <!-- Contenu -->
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->titre }}</h1>
                <p class="text-gray-700 mb-4">{{ $post->description }}</p>
                <p class="text-lg font-medium text-gray-800 mb-4">
                    Prix : {{ $post->prix ? $post->prix . ' €' : 'N/A' }}
                </p>
                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                    {{ $post->status === 'actif' ? 'bg-green-100 text-green-800' : 
                       ($post->status === 'brouillon' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                    {{ $post->status }}
                </span>
                <p class="text-sm text-gray-600 mt-4">Publié par : {{ $post->user->name ?? 'Utilisateur inconnu' }}</p>
            </div>
        </div>

        <!-- Section des commentaires -->
        <div class="max-w-3xl mx-auto mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Commentaires</h2>

            <!-- Formulaire pour ajouter un commentaire -->
            @auth
    <form action="{{ route('post.comment', $post->id) }}" method="POST" class="mb-6">
        @csrf
        <div class="flex flex-col sm:flex-row gap-4">
            <textarea name="content" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Ajouter un commentaire..." required></textarea>
            <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Commenter
            </button>
        </div>
        @error('content')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </form>
@else
    <p class="text-gray-600 mb-6">Connectez-vous pour ajouter un commentaire.</p>
@endauth

            <!-- Liste des commentaires -->
            @forelse ($post->comments as $comment)
                <div class="bg-gray-50 p-4 rounded-lg mb-4 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">
                                {{ $comment->user->name ?? 'Utilisateur inconnu' }}
                            </p>
                            <p class="text-gray-700 mt-1">{{ $comment->content }}</p>
                        </div>
                        <span class="text-xs text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Aucun commentaire pour ce post.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>