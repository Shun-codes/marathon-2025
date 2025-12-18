<x-layout.app :title="'Modifier un article'">
    <h1>Modifier l’article : {{ $article->titre }}</h1>

    <p>
        Dernière modification :
        <strong>{{ $article->updated_at->format('d/m/Y H:i') }}</strong>
    </p>

    <form method="POST" action="{{ route('articles.update', $article->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="{{ old('titre', $article->titre) }}" required>
        </div>

        <div>
            <label for="resume">Résumé :</label>
            <textarea id="resume" name="resume" required>{{ old('resume', $article->resume) }}</textarea>
        </div>

        <div>
            <label for="texte">Texte :</label>
            <textarea id="texte" name="texte" required>{{ old('texte', $article->texte) }}</textarea>
        </div>

        <div>
            <label for="image">Image (URL) :</label>
            <input type="text" id="image" name="image" value="{{ old('image', $article->image) }}" required>
        </div>

        <div>
            <label for="media">Media (URL audio) :</label>
            <input type="text" id="media" name="media" value="{{ old('media', $article->media) }}" required>
        </div>

        <div>
            <label for="rythme_id">Rythme :</label>
            <select id="rythme_id" name="rythme_id" required>
                @foreach($rythmes as $rythme)
                    <option value="{{ $rythme->id }}" {{ $article->rythme_id == $rythme->id ? 'selected' : '' }}>
                        {{ $rythme->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="accessibilite_id">Accessibilité :</label>
            <select id="accessibilite_id" name="accessibilite_id" required>
                @foreach($accessibilites as $accessibilite)
                    <option value="{{ $accessibilite->id }}" {{ $article->accessibilite_id == $accessibilite->id ? 'selected' : '' }}>
                        {{ $accessibilite->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="conclusion_id">Conclusion :</label>
            <select id="conclusion_id" name="conclusion_id" required>
                @foreach($conclusions as $conclusion)
                    <option value="{{ $conclusion->id }}" {{ $article->conclusion_id == $conclusion->id ? 'selected' : '' }}>
                        {{ $conclusion->texte }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    <h3>Activation de l’article</h3>
    <x-actif-button :article="$article" />
</x-layout.app>
