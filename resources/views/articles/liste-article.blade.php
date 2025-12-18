<x-layout.app title="Tous les articles">
<style>
    footer.footer-section{
        margin-top: 0;
        border-top : 1px solid #777777a8;
    }

    .btn {
    background-color: #ffbf00;
    color: #fff;
    padding: 0 30px;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.3s;
    height: 42px; /* Hauteur fixe alignée */
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
<div class="ttarticles-wrapper">

        <h1 class="titre-ttarticles"> Tous les articles en ligne </h1>
        
        <form method="GET" action="{{ route('articles.index') }}" class="ttarticles-form">
            
            <div class="ttarticles-group">
                <label for="auteur" class="ttarticles-label">Recherche Auteur</label>
                <input type="text" id="auteur" name="auteur" 
                       value="{{ request('auteur') }}" 
                       class="ttarticles-input" 
                       placeholder="Nom de l'auteur...">
            </div>

            <div class="ttarticles-group">
                <label for="rythme_id" class="ttarticles-label">Rythme</label>
                <select id="rythme_id" name="rythme_id" class="ttarticles-select">
                    <option value="">-- Tous les rythmes --</option>
                    @foreach($rythmes as $rythme)
                        <option value="{{ $rythme->id }}" {{ request('rythme_id') == $rythme->id ? 'selected' : '' }}>
                            {{ $rythme->texte }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ttarticles-group">
                <label for="accessibilite_id" class="ttarticles-label">Accessibilité</label>
                <select id="accessibilite_id" name="accessibilite_id" class="ttarticles-select">
                    <option value="">-- Niveau --</option>
                    @foreach($accessibilites as $accessibilite)
                        <option value="{{ $accessibilite->id }}" {{ request('accessibilite_id') == $accessibilite->id ? 'selected' : '' }}>
                            {{ $accessibilite->texte }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ttarticles-group">
                <label for="conclusion_id" class="ttarticles-label">Conclusion</label>
                <select id="conclusion_id" name="conclusion_id" class="ttarticles-select">
                    <option value="">-- Type --</option>
                    @foreach($conclusions as $conclusion)
                        <option value="{{ $conclusion->id }}" {{ request('conclusion_id') == $conclusion->id ? 'selected' : '' }}>
                            {{ $conclusion->texte }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="ttarticles-btn">Filtrer</button>
        </form>

        <div class="ttarticles-grid">
            @forelse($articles as $article)
                <x-card-article :article="$article" />
            @empty
                <div class="ttarticles-empty-box">
                    <p class="ttarticles-empty-text">Aucun article ne correspond à vos critères.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout.app>
