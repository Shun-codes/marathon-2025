<x-layout.app :title="'Créer un Article'">
    <style>
        footer.footer-section{
            margin-top: 0;
            border-top : 1px solid #777777a8;
        }  
    </style>
<div class="create-articles-section">
        
        <!-- SOLEIL (Image à Gauche) -->
        <div class="osol-decoration osol-decoration-left">
            <!-- Remplace par le bon chemin ou nom de fichier -->
            <img src="{{ Vite::asset('resources/images/icon_soleil.webp') }}" alt="Soleil Déco">
        </div>

        <!-- MARACAS (Image à Droite) -->
        <div class="osol-decoration osol-decoration-right">
            <!-- Remplace par le bon chemin ou nom de fichier -->
            <img src="{{ Vite::asset('resources/images/maracasse.png') }}" alt="Maracas Déco">
        </div>


        <div class="create-articles-container">
            
            <h1 class="create-articles-title">Créer un nouvel article</h1>

            @if ($errors->any())
                <div class="create-articles-errors" style="display:block; opacity:1;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('articles.store') }}" class="create-articles-form">
                @csrf

                <div class="create-articles-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" value="{{ old('titre') }}" class="create-articles-input" required placeholder="Titre de l'article...">
                </div>

                <div class="create-articles-group">
                    <label for="resume">Résumé</label>
                    <textarea id="resume" name="resume" class="create-articles-textarea" style="min-height: 80px;" required placeholder="Bref résumé...">{{ old('resume') }}</textarea>
                </div>

                <div class="create-articles-group">
                    <label for="texte">Texte complet</label>
                    <textarea id="texte" name="texte" class="create-articles-textarea" required placeholder="Contenu de l'article...">{{ old('texte') }}</textarea>
                </div>

                <div class="create-articles-group">
                    <label for="image">Image (URL)</label>
                    <input type="text" id="image" name="image" value="{{ old('image') }}" class="create-articles-input" required placeholder="http://...">
                </div>

                <div class="create-articles-group">
                    <label for="media">Media (URL audio)</label>
                    <input type="text" id="media" name="media" value="{{ old('media') }}" class="create-articles-input" required placeholder="Lien vers le fichier audio...">
                </div>

                <div class="create-articles-group">
                    <label for="rythme_id">Rythme</label>
                    <select id="rythme_id" name="rythme_id" class="create-articles-select" required>
                        <option value="">-- Choisir un rythme --</option>
                        @foreach($rythmes as $rythme)
                            <option value="{{ $rythme->id }}">{{ $rythme->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="create-articles-group">
                    <label for="accessibilite_id">Accessibilité</label>
                    <select id="accessibilite_id" name="accessibilite_id" class="create-articles-select" required>
                        <option value="">-- Choisir une accessibilité --</option>
                        @foreach($accessibilites as $accessibilite)
                            <option value="{{ $accessibilite->id }}">{{ $accessibilite->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="create-articles-group">
                    <label for="conclusion_id">Conclusion</label>
                    <select id="conclusion_id" name="conclusion_id" class="create-articles-select" required>
                        <option value="">-- Choisir une conclusion --</option>
                        @foreach($conclusions as $conclusion)
                            <option value="{{ $conclusion->id }}">{{ $conclusion->texte }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="create-articles-btn">Publier l'article</button>
            </form>
            <div class="osol-decoration osol-decoration-bottom-right">
                <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Maracas Déco">
             </div>
        </div>
        </div>
    </div>

    <!-- SCRIPT D'ANIMATION JS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // Éléments à animer
            const title = document.querySelector('.create-articles-title');
            const form = document.querySelector('.create-articles-form');
            const groups = document.querySelectorAll('.create-articles-group');
            const btn = document.querySelector('.create-articles-btn');
            
            // Images décoratives
            const decoLeft = document.querySelector('.osol-decoration-left');
            const decoRight = document.querySelector('.osol-decoration-right');
            const guitar = document.querySelector('.guitar-wrapper');

            // --- ANIMATIONS ---
            const fadeInOptions = { duration: 800, easing: 'cubic-bezier(0.25, 1, 0.5, 1)', fill: 'forwards' };
            const fadeInKeyframes = [
                { opacity: 0, transform: 'translateY(20px)' },
                { opacity: 1, transform: 'translateY(0)' }
            ];
            
            // Soleil : Entre en tournant
            const sunEntry = [
                { opacity: 0, transform: 'translateX(-100px) rotate(-90deg)' },
                { opacity: 1, transform: 'translateX(0) rotate(0deg)' }
            ];

            // Maracas : Entrent en secouant un peu
            const maracasEntry = [
                { opacity: 0, transform: 'translateX(100px) rotate(20deg)' },
                { opacity: 1, transform: 'translateX(0) rotate(0deg)' }
            ];

            // Guitare : Monte du bas
            const guitarEntry = [
                { transform: 'translateY(100%)', opacity: 0 },
                { transform: 'translateY(0)', opacity: 1 }
            ];

            // Séquence
            setTimeout(() => {
                // 1. Titre
                title.animate(fadeInKeyframes, fadeInOptions);
                
                // 2. Images arrivent des côtés
                if(decoLeft) decoLeft.animate(sunEntry, { duration: 1200, easing: 'ease-out', fill: 'forwards' });
                if(decoRight) decoRight.animate(maracasEntry, { duration: 1200, easing: 'ease-out', fill: 'forwards' });
                if(guitar) guitar.animate(guitarEntry, { duration: 1500, easing: 'ease-out', fill: 'forwards', delay: 500 });

                // 3. Le Formulaire
                setTimeout(() => {
                    form.animate(fadeInKeyframes, fadeInOptions);

                    // 4. Les Champs en cascade (Stagger)
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

                    // 5. Bouton à la fin
                    setTimeout(() => {
                        btn.animate(fadeInKeyframes, fadeInOptions);
                    }, groups.length * 80 + 200);

                }, 300); 
            }, 100);
        });
    </script>
</x-layout.app>