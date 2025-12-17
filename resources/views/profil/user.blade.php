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
        <h2>Articles écrits</h2>
        <div>
        </div>
        <hr>

        {{-- articles qu'il aime --}}
        <h2>Articles aimés</h2>
        <ul>
            @forelse($utilisateur->likes as $article)
                <li>{{ $article->titre }}</li>
            @empty
                <li>Cet utilisateur n'a pas encore aimé d'articles.</li>
            @endforelse
        </ul>

    </section>
</x-layout.app>