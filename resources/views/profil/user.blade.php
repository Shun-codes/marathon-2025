<x-layout.app title="Profil de {{ $utilisateur->name }}">
    <section>
        {{-- nom et avatar --}}
        <div>
            <img src="{{ $utilisateur->avatar }}" alt="Avatar de {{ $utilisateur->name }}" style="width: 100px;">
            <h1>{{ $utilisateur->name }}</h1>
        </div>

        {{-- statistiques (abonnés/abonnements) --}}
        <div>
            <p>Abonnés : {{ $utilisateur->suiveurs->count() }}</p>
            <p>Abonnements : {{ $utilisateur->suivis->count() }}</p>
        </div>

        {{-- bouton s'abonner --}}
        <x-follow-button :utilisateur="$utilisateur" />

        <hr>

        {{-- préférences --}}
        <div>
            <h3>Préférences musicales</h3>
            <p>Rythmes préférés :
                @foreach($utilisateur->likes as $like)
                    <span>{{ $like->article->rythme->texte ?? '' }}</span>
                @endforeach
            </p>
        </div>

        <hr>
        {{-- liste des articles écrits --}}
        <div>
            <h2>Articles écrits</h2>
            <div>
                @forelse($utilisateur->mesArticles()->where('en_ligne', 1)->get() as $article)
                    <x-card-article :article="$article" />
                @empty
                    <p>Aucun article écrits.</p>
                @endforelse

            </div>
        </div>
        <hr>

    </section>
</x-layout.app>