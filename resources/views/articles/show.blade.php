<x-layout.app :title="$article->titre">
    @if(Auth::check() && Auth::id() === $article->user_id)
        <div x-data="{ open: false }">
            <!-- Bouton qui ouvre la confirmation -->
            <button @click="open = true" class="bg-red-600 text-white px-3 py-1 rounded">
                Supprimer l’article
            </button>

            <!-- Fenêtre de confirmation -->
            <div x-show="open"
                 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                 x-transition>
                <div class="bg-white p-6 rounded shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Confirmation</h2>
                    <p class="mb-4">Êtes-vous sûr de vouloir supprimer cet article ?</p>

                    <div class="flex justify-end space-x-2">
                        <button @click="open = false" class="px-3 py-1 bg-gray-300 rounded">
                            Annuler
                        </button>

                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h1>{{ $article->titre }}</h1>
    <p><strong>Auteur :</strong> {{ $article->editeur->name }}</p>
    <p><strong>Résumé :</strong> {{ $article->resume }}</p>
        <p><strong>Texte :</strong> {{ $article->texte }}</p>
    <img src="{{ asset(path: $article-> image) }}" alt="{{ $article->titre }}" style="max-width:300px;">
    <audio controls src="{{ $article->media }}"></audio>

    <p><strong>Rythme :</strong> {{ $article->rythme->texte }}</p>
    <p><strong>Accessibilité :</strong> {{ $article->accessibilite->texte }}</p>
    <p><strong>Conclusion :</strong> {{ $article->conclusion->texte }}</p>

    <p><strong>Nombre de vues :</strong> {{ $article->nb_vues }}</p>

    <h3>Commentaires</h3>
    @forelse($article->avis as $avis)
            <x-commentaire :avis="$avis" />
    @empty
        <p>Aucun commentaire pour le moment.</p>
    @endforelse

        <x-commentaire-form :article="$article" />


    @if(auth()->check())
        <x-like :article="$article" />
    @else
        <p><a href="{{ route('login') }}">Connectez-vous</a> pour liker cet article.</p>
    @endif
</x-layout.app>
