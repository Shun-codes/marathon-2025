<x-layout.app title="Tous les articles">
    <h1>Tous les articles</h1>

    <div class="articles">
        @foreach($articles as $article)
            <x-card-article :article="$article" />
        @endforeach
    </div>
</x-layout.app>
