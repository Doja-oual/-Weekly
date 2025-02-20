<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <h1 class="text-2xl font-bold mb-6">Modifier la catégorie</h1>

                <form action="{{ route('categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $categorie->nom) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('nom')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $categorie->slug) }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Mettre à jour la catégorie
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>