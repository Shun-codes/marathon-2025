<div class="card">
    <div class="carte-container">
        <p class="carte-auteur">
            <a href="{{ route('profil.user', $article->user_id) }}">
                {{ $article->editeur->name }}
            </a>
        </p>
        <p class="carte-date"><small>{{ $article->created_at->format('d/m/Y') }}</small></p>
    </div>
    <h2>{{ $article->titre }}</h2>
        <img src="{{ $article->image }}" alt="{{ $article->titre }}" style="max-width:200px;">
    <p class="carte-resume">{{ $article->resume }}</p>

    

    <p>
        Statut :
        @if($article->en_ligne)
            <span>En ligne</span>
        @else
            <span>Hors ligne</span>
        @endif
    </p>

    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">
        Voir l’article
    </a>

    <x-actif-button :article="$article" />
</div>
