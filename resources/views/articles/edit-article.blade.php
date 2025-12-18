<x-layout.app :title="'Modifier un article'">
<div class="create-articles-section">
        
        <div class="osol-decoration osol-decoration-left">
            <img src="{{ Vite::asset('resources/images/icon_soleil.webp') }}" alt="Soleil Déco">
        </div>

        <div class="osol-decoration osol-decoration-right">
            <img src="{{ Vite::asset('resources/images/maracasse.png') }}" alt="Maracas Déco">
        </div>

        <div class="osol-decoration osol-decoration-bottom">
            <div class="osol-decoration note-1 music-note">♪</div>
            <div class="osol-decoration note-2 music-note">♫</div>
            <div class="osol-decoration note-3 music-note">♩</div>
            <div class="osol-decoration note-4 music-note">♬</div>

            <div class="guitar-wrapper">
                <img src="{{ Vite::asset('resources/images/guitare.png') }}" alt="Guitare Déco">
            </div>
        </div>

        <div class="create-articles-container">
            
            <h1 class="create-articles-title">Modifier l'article</h1>
            
            <p class="create-articles-subtitle">
                Dernière modification : <strong>{{ $article->updated_at->format('d/m/Y H:i') }}</strong>
            </p>

            @if ($errors->any())
                <div class="create-articles-errors" style="display:block; opacity:1;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('articles.update', $article->id) }}" class="create-articles-form">
                @csrf
                @method('PUT')

                <div class="create-articles-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" value="{{ old('titre', $article->titre) }}" class="create-articles-input" required>
                </div>

                <div class="create-articles-group">
                    <label for="resume">Résumé</label>
                    <textarea id="resume" name="resume" class="create-articles-textarea" required>{{ old('resume', $article->resume) }}</textarea>
                </div>

                <div class="create-articles-group">
                    <label for="texte">Texte</label>
                    <textarea id="texte" name="texte" class="create-articles-textarea" required>{{ old('texte', $article->texte) }}</textarea>
                </div>

                <div class="create-articles-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" id="image" name="image" value="{{ old('image', $article->image) }}" class="create-articles-input" required>
                </div>

                <div class="create-articles-group">
                    <label for="media">Media (URL audio)</label>
                    <input type="text" id="media" name="media" value="{{ old('media', $article->media) }}" class="create-articles-input" required>
                </div>

                <div class="create-articles-group">
                    <label for="rythme_id">Rythme</label>
                    <select id="rythme_id" name="rythme_id" class="create-articles-select" required>
                        @foreach($rythmes as $rythme)
                            <option value="{{ $rythme->id }}" {{ $article->rythme_id == $rythme->id ? 'selected' : '' }}>
                                {{ $rythme->texte }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="create-articles-group">
                    <label for="accessibilite_id">Accessibilité</label>
                    <select id="accessibilite_id" name="accessibilite_id" class="create-articles-select" required>
                        @foreach($accessibilites as $accessibilite)
                            <option value="{{ $accessibilite->id }}" {{ $article->accessibilite_id == $accessibilite->id ? 'selected' : '' }}>
                                {{ $accessibilite->texte }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="create-articles-group">
                    <label for="conclusion_id">Conclusion</label>
                    <select id="conclusion_id" name="conclusion_id" class="create-articles-select" required>
                        @foreach($conclusions as $conclusion)
                            <option value="{{ $conclusion->id }}" {{ $article->conclusion_id == $conclusion->id ? 'selected' : '' }}>
                                {{ $conclusion->texte }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="create-articles-btn">Mettre à jour</button>
            </form>

            <!-- Bouton Activation (Hors Formulaire) -->
            <div class="activation-section">
                <h3 class="activation-title">État de l'article</h3>
                <x-actif-button :article="$article" />
            </div>

        </div>
    </div>

    <!-- SCRIPT D'ANIMATION -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            const title = document.querySelector('.create-articles-title');
            const subtitle = document.querySelector('.create-articles-subtitle');
            const form = document.querySelector('.create-articles-form');
            const groups = document.querySelectorAll('.create-articles-group');
            const btn = document.querySelector('.create-articles-btn');
            const activation = document.querySelector('.activation-section');
            
            const decoLeft = document.querySelector('.osol-decoration-left');
            const decoRight = document.querySelector('.osol-decoration-right');
            const guitar = document.querySelector('.guitar-wrapper');

            const fadeInOptions = { duration: 800, easing: 'cubic-bezier(0.25, 1, 0.5, 1)', fill: 'forwards' };
            const fadeInKeyframes = [
                { opacity: 0, transform: 'translateY(20px)' },
                { opacity: 1, transform: 'translateY(0)' }
            ];
            
            const sunEntry = [
                { opacity: 0, transform: 'translateX(-100px) rotate(-90deg)' },
                { opacity: 1, transform: 'translateX(0) rotate(0deg)' }
            ];

            const maracasEntry = [
                { opacity: 0, transform: 'translateX(100px) rotate(20deg)' },
                { opacity: 1, transform: 'translateX(0) rotate(0deg)' }
            ];

            const guitarEntry = [
                { transform: 'translateY(100%)', opacity: 0 },
                { transform: 'translateY(0)', opacity: 1 }
            ];

            setTimeout(() => {
                title.animate(fadeInKeyframes, fadeInOptions);
                if(subtitle) subtitle.animate(fadeInKeyframes, { ...fadeInOptions, delay: 100 });
                
                if(decoLeft) decoLeft.animate(sunEntry, { duration: 1200, easing: 'ease-out', fill: 'forwards' });
                if(decoRight) decoRight.animate(maracasEntry, { duration: 1200, easing: 'ease-out', fill: 'forwards' });
                if(guitar) guitar.animate(guitarEntry, { duration: 1500, easing: 'ease-out', fill: 'forwards', delay: 500 });

                setTimeout(() => {
                    form.animate(fadeInKeyframes, fadeInOptions);

                    groups.forEach((group, index) => {
                        setTimeout(() => {
                            group.animate(
                                [
                                    { opacity: 0, transform: 'translateX(-10px)' },
                                    { opacity: 1, transform: 'translateX(0)' }
                                ],
                                { duration: 500, easing: 'ease-out', fill: 'forwards' }
                            );
                        }, 100 + (index * 80)); 
                    });

                    setTimeout(() => {
                        btn.animate(fadeInKeyframes, fadeInOptions);
                        if(activation) activation.animate(fadeInKeyframes, fadeInOptions);
                    }, groups.length * 80 + 200);

                }, 300); 
            }, 100);
        });
    </script>
</x-layout.app>
