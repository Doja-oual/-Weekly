<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
            <h1 class="text-2xl font-bold mb-6">Modifier le post</h1>

            <form method="POST" action="{{ route('post.update', $posts->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                <div class="mb-4">
                    <label for="titre" class="block text-gray-700 font-semibold mb-2">Titre</label>
                    <input type="text" name="titre" id="titre" value="{{ old('titre', $posts->titre) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('titre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $posts->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="prix" class="block text-gray-700 font-semibold mb-2">Prix</label>
                    <input type="number" name="prix" id="prix" step="0.01" value="{{ old('prix', $posts->prix) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('prix')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                    @if ($posts->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->titre }}"
                                 class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-600">Image actuelle</p>
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="categorie_id" class="block text-gray-700 font-semibold mb-2">Catégorie</label>
                    <select name="categorie_id" id="categorie_id"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="" disabled>Choisir une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                    {{ old('categorie_id', $posts->categorie_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Statut</label>
                    <select name="status" id="status"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="actif" {{ old('status', $posts->status) == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="brouillon" {{ old('status', $posts->status) == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                        <option value="archivé" {{ old('status', $posts->status) == 'archivé' ? 'selected' : '' }}>Archivé</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Mettre à jour le post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>