<x-layout.app>
<style>
        main{
            background-color: #fff;
        }
        footer.footer-section{
            margin-top: 0;
            border-top : 1px solid #777777a8;
        }
</style>
 <div class="register-section">
    <!-- <div class="register-video-bg"> -->
        <!-- <video autoplay muted playsinline loop preload="auto">
        <source src="test.mp4" type="video/mp4">

        </video> -->
    <!-- </div> -->
        <div class="register-content">
            
            <div class="logo-header4">
                <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Logo OsolSound">
                <p class="logo-text4">Inscription</p>
            </div>

            <form action="{{ route('register') }}" method="post" class="register-form2">
                @csrf
                
                <div class="form-group2">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" required placeholder="Votre nom complet"/>
                </div>

                <div class="form-group2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required placeholder="votre@email.com"/>
                </div>

                <div class="form-group2">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required placeholder="Choisissez un mot de passe"/>
                </div>

                <div class="form-group2">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Répétez le mot de passe"/>
                </div>

                <button type="submit">S'inscrire</button>
            </form>

            <p class="auth-footer2">
                Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
            </p>

        </div>
    </div>

</x-layout.app>