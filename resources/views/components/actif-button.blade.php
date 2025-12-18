@auth
    @if(auth()->id() === $article->user_id)
        <form method="POST" action="{{ route('articles.toggle', $article) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn-card-modif" id="bouton-activer" >
                {{ $article->en_ligne ? 'Désactiver' : 'Activer' }}
            </button>
        </form>
    @endif
@endauth
