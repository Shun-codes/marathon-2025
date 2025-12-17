<x-layout.app title="Tous les articles">
    <h1>Tous les articles</h1>

    @auth
        <a href="{{ route('articles.create') }}">Créer un article</a>
    @endauth

    <div class="articles">
        @foreach($articles as $article)
            @if($article->en_ligne || (auth()->check() && auth()->id() === $article->user_id))
                <x-card-article :article="$article" />
            @endif
        @endforeach
    </div>
</x-layout.app>
