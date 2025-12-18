<div class="card glass">
    <div class="carte-container">
        <p class="carte-auteur">
            <a href="{{ route('profil.user', $article->user_id) }}">
                {{ $article->editeur->name }}
            </a>
        </p>
        <p class="carte-date"><small>{{ $article->created_at->format('d/m/Y') }}</small></p>
    </div>

    <h2>{{ $article->titre }}</h2>
    <img src="{{ asset(path: $article-> image) }}" alt="{{ $article->titre }}" style="max-width:200px;">
    <p class="carte-resume">{{ $article->resume }}</p>
    
    <a href="{{ route('articles.show', $article->id) }}" class="btn-card">
        Voir l’article
    </a>

    <div id="a-modifier"> <!-- bouton de mofif article -->

        <x-actif-button :article="$article" />

        @auth
            @if(auth()->id() === $article->user_id)
                <a class="btn-card-modif" href="{{ route('articles.edit', $article->id) }}">
                    Modifier
                </a>
            @endif
        @endauth

    </div>

</div>
