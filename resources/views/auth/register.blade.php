<x-layout.app title="Inscription">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" required placeholder="Nom"/><br/>
        <input type="email" name="email" required placeholder="Email"/><br/>
        <input type="password" name="password" required placeholder="Mot de passe"/><br/>
        <input type="password" name="password_confirmation" required placeholder="Confirmer le mot de passe"/><br/>

        <button type="submit">S'inscrire</button><br/>
    </form>

    <p>
        Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
    </p>
</x-layout.app>