<x-layout.app :title="'Créer un article'">
    <h1>Créer un nouvel article</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required>
        </div>

        <div>
            <label for="resume">Résumé :</label>
            <textarea id="resume" name="resume" required>{{ old('resume') }}</textarea>
        </div>

        <div>
            <label for="texte">Texte :</label>
            <textarea id="texte" name="texte" required>{{ old('texte') }}</textarea>
        </div>

        <div>
            <label for="image">Image (URL) :</label>
            <input type="text" id="image" name="image" value="{{ old('image') }}" required>
        </div>

        <div>
            <label for="media">Media (URL audio) :</label>
            <input type="text" id="media" name="media" value="{{ old('media') }}" required>
        </div>

        <div>
            <label for="rythme_id">Rythme :</label>
            <select id="rythme_id" name="rythme_id" required>
                <option value="">-- Choisir un rythme --</option>
                @foreach($rythmes as $rythme)
                    <option value="{{ $rythme->id }}">{{ $rythme->texte }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="accessibilite_id">Accessibilité :</label>
            <select id="accessibilite_id" name="accessibilite_id" required>
                <option value="">-- Choisir une accessibilité --</option>
                @foreach($accessibilites as $accessibilite)
                    <option value="{{ $accessibilite->id }}">{{ $accessibilite->texte }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="conclusion_id">Conclusion :</label>
            <select id="conclusion_id" name="conclusion_id" required>
                <option value="">-- Choisir une conclusion --</option>
                @foreach($conclusions as $conclusion)
                    <option value="{{ $conclusion->id }}">{{ $conclusion->texte }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Créer</button>
    </form>
</x-layout.app>
