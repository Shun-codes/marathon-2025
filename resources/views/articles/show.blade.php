<x-layout.app :title="$article->titre">
    <section class="container detail-article">
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
        
        <div class="image-container">
            <img src="{{ $article->image }}" alt="{{ $article->titre }}" style="max-width:300px;">
            <div>
                <p class="carte-auteur"><strong>{{ $article->editeur->name }}</strong> </p>
                <p class="carte-auteur"><strong>{{ $article->nb_vues }} vues</strong> </p>
            </div>
        </div>

        <div id="article-infos">
            <h1 class="titre">{{ $article->titre }}</h1>
            <p><strong class="S-titre">Résumé :</strong> {{ $article->resume }}</p>
            <p><strong class="S-titre">Rythme :</strong> {{ $article->rythme->texte }}</p>
            <p><strong class="S-titre">Accessibilité :</strong> {{ $article->accessibilite->texte }}</p>
            <p><strong class="S-titre">Conclusion :</strong> {{ $article->conclusion->texte }}</p>
            <audio controls src="{{ $article->media }}"></audio>
            
            @if(auth()->check())
                <x-like :article="$article" />
            @else
                <p><a href="{{ route('login') }}">Connectez-vous</a> pour liker cet article.</p>
            @endif
        </div>

        <div id="commentaires">   
            <h3 class="titre">Commentaires</h3>
            <div id="avis-container">
                @forelse($article->avis as $avis)
                    <x-commentaire :avis="$avis" />
                @empty
                    <p>Aucun commentaire pour le moment.</p>
                @endforelse
            </div>
            

                <x-commentaire-form :article="$article" />
        </div>

    </section>
</x-layout.app>
