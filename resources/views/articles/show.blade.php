<x-layout.app :title="$article->titre">
    <h1>{{ $article->titre }}</h1>
    <p><strong>Auteur :</strong> {{ $article->editeur->name }}</p>
    <p><strong>Résumé :</strong> {{ $article->resume }}</p>
    <img src="{{ $article->image }}" alt="{{ $article->titre }}" style="max-width:300px;">
    <audio controls src="{{ $article->media }}"></audio>

    <p><strong>Rythme :</strong> {{ $article->rythme->texte }}</p>
    <p><strong>Accessibilité :</strong> {{ $article->accessibilite->texte }}</p>
    <p><strong>Conclusion :</strong> {{ $article->conclusion->texte }}</p>

    <p><strong>Nombre de vues :</strong> {{ $article->nb_vues }}</p>

    <h3>Commentaires</h3>
    @forelse($article->avis as $avis)
        <p>{{ $avis->contenu }} — par {{ $avis->user->name }}</p>

        @if(Auth::check() && Auth::id() === $avis->user_id)
            <form action="{{ route('avis.destroy', $avis) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        @endif
    @empty
        <p>Aucun commentaire pour le moment.</p>
    @endforelse

    @if(Auth::check())
        <form action="{{ route('avis.store', $article) }}" method="POST">
            @csrf
            <textarea name="contenu" required></textarea>
            <button type="submit">Ajouter un commentaire</button>
        </form>
    @endif


    @if(auth()->check())
        <x-like :article="$article" />
    @else
        <p><a href="{{ route('login') }}">Connectez-vous</a> pour liker cet article.</p>
    @endif
</x-layout.app>
