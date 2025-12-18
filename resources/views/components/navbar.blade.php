<nav class="navbar">
    <div class="logo-navbar">
        <img src="{{ Vite::asset('resources/images/logo.webp') }}" alt="Logo OsolSound">
        <p class="logo-text">O Sol Sound</p>
    </div> 

    <div class="nav-responsive">
        <a href="{{route('home')}}" class="lien-a" id="active-page">Accueil</a>
        <a href="{{route('articles.index')}}"class="lien-a">Articles</a>
        <a href="{{ route('presentation') }}"class="lien-a">Présentation</a>
        <a href="{{ route('contact') }}"class="lien-a">Contact</a>
    </div>
    <div>
        @auth
        <a href="{{route("profil.show")}}" class="lien-a"> 
            {{Auth::user()->name}}
        </a>
        <a href="{{route("logout")}}" class="lien-a"
        onclick="document.getElementById('logout').submit(); return false;"> <i class='bx bx-log-out-circle'></i></a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
        @else
            <a href="{{route("login")}}" class="btn-connexion">Connexion</a>
        @endauth
    </div>
    
    <button class="burger-menu" id="burger-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <div id="nav-bar" class="Unactive">
                <a href="{{route('home')}}" class="lien-a" id="active-page">Accueil</a>
                <a href="{{route('articles.index')}}"class="lien-a">Articles</a>
                <a href="{{ route('presentation') }}"class="lien-a">Présentation</a>
                <a href="{{ route('contact') }}"class="lien-a">Contact</a>
            </div>
            
    </button>

</nav>