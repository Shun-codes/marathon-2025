<x-layout.app title="Profil de {{ $utilisateur->name }}">
<div class="user-profile-container">

            <!-- CARTE D'IDENTITÉ -->
            <div class="user-profile-header-card">
                
                <div class="user-profile-info-block">
                    <!-- Avatar -->
                    <img src="{{ $utilisateur->avatar ?? asset('images/default-avatar.png') }}" 
                         alt="Avatar de {{ $utilisateur->name }}" 
                         class="user-profile-avatar">
                    
                    <div class="user-profile-name-block">
                        <h1>{{ $utilisateur->name }}</h1>
                        
                        <!-- Statistiques -->
                        <div class="user-profile-stats">
                            <span><strong>{{ $utilisateur->suiveurs->count() }}</strong> Abonnés</span>
                            <span><strong>{{ $utilisateur->suivis->count() }}</strong> Abonnements</span>
                        </div>

                        <!-- Bouton S'abonner -->
                        <div class="user-profile-actions">
                            <x-follow-button :utilisateur="$utilisateur" />
                        </div>
                    </div>
                </div>

                <hr class="user-profile-hr">

                <!-- Préférences -->
                <div class="user-profile-prefs">
                    <h3>Préférences musicales</h3>
                    <div class="user-profile-tags">
                        @forelse($utilisateur->likes->unique('article.rythme_id') as $like)
                            @if($like->article && $like->article->rythme)
                                <span class="user-profile-tag">{{ $like->article->rythme->texte }}</span>
                            @endif
                        @empty
                            <span style="color: #888; font-style: italic;">Pas encore de préférences définies.</span>
                        @endforelse
                    </div>
                </div>

            </div>

            <!-- LISTE DES ARTICLES -->
            <div>
                <h2 class="user-profile-articles-title">Articles écrits</h2>
                
                <div class="user-profile-grid">
                    @forelse($utilisateur->mesArticles()->where('en_ligne', 1)->get() as $article)
                        <!-- Utilisation du composant carte existant -->
                        <x-card-article :article="$article" />
                    @empty
                        <div class="user-profile-empty">
                            <p>Aucun article publié pour le moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
</x-layout.app>