<nav>
    <a href="{{route('home')}}">Accueil</a>
    <a href="#">Presentation</a>
    <a href="{{route('liste-article')}}">Article</a>
    <a href="{{ route('contact') }}">Contact</a>

    @auth
        {{Auth::user()->name}}
        <a href="{{route("logout")}}"
           onclick="document.getElementById('logout').submit(); return false;">Logout</a>
        <form id="logout" action="{{route("logout")}}" method="post">
            @csrf
        </form>
    @else
        <a href="{{route("login")}}">Login</a>
        <a href="{{route("register")}}">Register</a>
    @endauth
</nav>