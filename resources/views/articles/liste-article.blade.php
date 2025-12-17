<x-layout.app title="Tous les articles">
    <h1>Tous les articles</h1>

    @auth
        <a href="{{ route('articles.create') }}">Créer un article</a>
    @endauth

    <form method="GET" action="{{ route('articles.index') }}" class="filtre-form">
        <div>
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" value="{{ request('auteur') }}">
        </div>

        <div>
            <label for="rythme_id">Rythme :</label>
            <select id="rythme_id" name="rythme_id">
                <option value="">-- Tous --</option>
                @foreach($rythmes as $rythme)
                    <option value="{{ $rythme->id }}" {{ request('rythme_id') == $rythme->id ? 'selected' : '' }}>
                        {{ $rythme->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="accessibilite_id">Accessibilité :</label>
            <select id="accessibilite_id" name="accessibilite_id">
                <option value="">-- Toutes --</option>
                @foreach($accessibilites as $accessibilite)
                    <option value="{{ $accessibilite->id }}" {{ request('accessibilite_id') == $accessibilite->id ? 'selected' : '' }}>
                        {{ $accessibilite->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="conclusion_id">Conclusion :</label>
            <select id="conclusion_id" name="conclusion_id">
                <option value="">-- Toutes --</option>
                @foreach($conclusions as $conclusion)
                    <option value="{{ $conclusion->id }}" {{ request('conclusion_id') == $conclusion->id ? 'selected' : '' }}>
                        {{ $conclusion->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Filtrer</button>
    </form>

    <div class="articles">
        @foreach($articles as $article)
            <x-card-article :article="$article" />
        @endforeach
    </div>
</x-layout.app>
