<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <h1 class="text-4xl font-bold text-gray-800">Wekly</h1>
            <form action="{{ route('post.post') }}" method="GET" class="w-full sm:w-1/2">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Rechercher un post..."
                           class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm">
                    <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <a href="{{ route('post.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Ajouter un Post
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="w-full h-64 bg-gray-200">
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

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $post->titre }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($post->description, 50) }}</p>
                        <p class="text-sm font-medium text-gray-700 mt-2">
                            {{ $post->prix ? $post->prix . ' €' : 'N/A' }}
                        </p>
                    </div>

                    <!-- Actions (Like & Commentaire) -->
                    <div class="p-4 border-t border-gray-200 flex items-center space-x-6">
                        <!-- Like -->
                        @auth
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center space-x-1 text-gray-600 hover:text-red-500">
                                    <svg class="w-6 h-6 {{ $post->likedByUser() ? 'text-red-500 fill-current' : '' }}"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    <span>{{ $post->likes->count() }}</span>
                                </button>
                            </form>
                        @else
                            <span class="flex items-center space-x-1 text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <span>#</span>
                            </span>
                        @endauth

                        <!-- Commentaire -->
                        <div class="flex items-center space-x-1 text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <span>#</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center col-span-full">Aucun post disponible.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>