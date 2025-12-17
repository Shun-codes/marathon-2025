<x-layout.app title="Mon profil">
    <section>

        {{-- navigation : retourner à l'accueil et modifier le profil --}}
        <div>
            <a href="{{ route('accueil') }}">Retour à l'accueil</a>
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

    </section>
</x-layout.app>
