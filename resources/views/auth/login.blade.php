<x-layout.app>
    <style>
        footer.footer-section{
            margin-top: 0;
            border-top : 1px solid #777777a8;
        }
    </style>
    <div class="login-section">
        <div class="login-content">
            
            <div class="logo-header2">
                <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Logo OsolSound">
                <p class="logo-text5">Connexion</p>
            </div>

            <form action="{{ route('login') }}" method="post" class="login-form">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required placeholder="votre@email.com"/>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required placeholder="Votre mot de passe"/>
                </div>

                <div class="remember-group">
                    <input type="checkbox" name="remember" id="remember"/>
                    <label for="remember" class="remember-label">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn-login">Se connecter</button>
            </form>
            <div class="register-link-form">
                <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
            </div>
        </div>
    </div>
</x-layout.app>
