<x-layout.app title="Mon profil">
    <section>

        {{-- navigation : retourner à l'accueil et modifier le profil --}}
        <div>
            <a href="{{ route('home') }}">Retour à l'accueil</a>
            <br>
            <a href="{{ route('profil.edit', $utilisateur->id) }}">Modifier mon profil</a>
        </div>

        {{-- profil : avatar + infos du compte --}}
        <div>
            <div>
                <img src="{{ $utilisateur->avatar }}"
                     alt="Avatar de {{ $utilisateur->name }}">
            </div>
            <div>
                <h1>Nom : {{ $utilisateur->name }}</h1>
                <p>Email : {{ $utilisateur->email }}</p>
                <p>Membre depuis : {{ $utilisateur->created_at }}</p>
            </div>
        </div>

        {{-- statistiques sur les followers --}}
        <div>
            <p>Abonnés : {{ $utilisateur->suiveurs()->count() }}</p>
            <p>Abonnements : {{ $utilisateur->suivis()->count() }}</p>
        </div>

        {{-- Ses articles en cours de rédaction --}}
        <div>
            <h2>Articles en cours de rédaction</h2>
            <div>
                @forelse($utilisateur->mesArticles()->where('en_ligne', 0)->get() as $article)
                    {{-- On utilise ton composant existant --}}
                    <x-card-article :article="$article" />
                @empty
                    <p>Aucun article en cours de rédaction.</p>
                @endforelse
            </div>
        </div>

        <br>

        {{-- Les articles qu’il a aimés --}}
        <div>
            <h2>Articles aimés</h2>
            <div>
                @forelse($utilisateur->likes as $article)
                    <x-card-article :article="$article" />
                @empty
                    <p>Aucun article aimé.</p>
                @endforelse
            </div>
        </div>

    </section>
</x-layout.app>