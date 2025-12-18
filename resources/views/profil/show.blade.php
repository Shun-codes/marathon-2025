<x-layout.app title="Mon profil">

<style>
    footer.footer-section{
        margin-top: 0;
        border-top : 1px solid #777777a8;
    }

    p{
        margin-bottom:30px;
    }

    .carte-resume {
    padding: 0.3rem 0;
    text-align: center;
    color: #ffffff;
}
</style>

    <section class="profilcss-section">
        <div class="profilcss-container">

            <!-- CARTE PROFIL (Fond Blanc) -->
            <div class="profilcss-header-card">
                
                <!-- Liens de navigation -->
                <div class="profilcss-nav-links">
                    <a href="{{ route('home') }}">← Retour à l'accueil</a>
                    <a href="{{ route('profil.edit', $utilisateur->id) }}" style="background: #006D2C; color: white; padding: 5px 15px; border-radius: 4px; text-decoration: none;">
                        Modifier mon profil
                    </a>
                </div>

                <!-- Infos Utilisateur -->
                <div class="profilcss-user-info">
                    <div class="profilcss-avatar-wrapper">
                        <!-- Fallback avatar si vide -->
                        <img src="{{ $utilisateur->avatar ?? asset('images/default-avatar.png') }}"
                             alt="Avatar de {{ $utilisateur->name }}"
                             class="profilcss-avatar">
                    </div>
                    
                    <div class="profilcss-info-text">
                        <h1>{{ $utilisateur->name }}</h1>
                        <p><strong>Email :</strong> {{ $utilisateur->email }}</p>
                        <p><strong>Membre depuis :</strong> {{ $utilisateur->created_at->format('d/m/Y') }}</p>
                        
                        <!-- Statistiques -->
                        <div class="profilcss-stats">
                            <div class="profilcss-stat-item">
                                <span class="profilcss-stat-value">{{ $utilisateur->suiveurs()->count() }}</span>
                                <span class="profilcss-stat-label">Abonnés</span>
                            </div>
                            <div class="profilcss-stat-item">
                                <span class="profilcss-stat-value">{{ $utilisateur->suivis()->count() }}</span>
                                <span class="profilcss-stat-label">Abonnements</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ARTICLES EN COURS (Brouillons) -->
            <div class="profilcss-content-section">
                <h2 class="profilcss-section-title">Articles en cours de rédaction</h2>
                <!-- Créer un article -->

                @auth
                    <a href="{{ route('articles.create') }}" class="profilcss-create-article-btn">
                        + Créer un nouvel article
                    </a>
                @endauth

                <div class="profilcss-grid">
                    @forelse($utilisateur->mesArticles()->where('en_ligne', 0)->get() as $article)
                        <x-card-article :article="$article" />
                    @empty
                        <div class="profilcss-empty-msg">
                            Aucun article en cours de rédaction.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- ARTICLES AIMÉS -->
            <div class="profilcss-content-section">
                <h2 class="profilcss-section-title">Articles aimés</h2>
                
                <div class="profilcss-grid">
                    @forelse($utilisateur->likes as $article)
                        <x-card-article :article="$article" />
                    @empty
                        <div class="profilcss-empty-msg">
                            Aucun article aimé pour le moment.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
</x-layout.app>