<nav class="navbar">
    <div class="logo-navbar">
        <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Logo OsolSound">
        <p class="logo-text">O Sol Sound</p>
    </div> 

    <a href="{{route('home')}}" class="lien-a" id="active-page">Accueil</a>
    <a href="{{route('articles.index')}}"class="lien-a">Article</a>
    <a href="{{ route('presentation') }}"class="lien-a">Présentation</a>
    <a href="{{ route('contact') }}"class="lien-a">Contact</a>

    @auth
        <a href="{{route("profil.show")}}">
            {{Auth::user()->name}}
        </a>
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}" class="btn-connexion">Connexion</a>
    @endauth
</nav>