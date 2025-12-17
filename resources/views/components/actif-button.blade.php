@auth
    @if(auth()->id() === $article->user_id)
        <form method="POST" action="{{ route('articles.toggle', $article) }}" style="display:inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-secondary">
                {{ $article->en_ligne ? 'Désactiver' : 'Activer' }}
            </button>
        </form>
    @endif
@endauth
