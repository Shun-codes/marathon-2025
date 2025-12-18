<x-layout.app :title="'Page Accueil'">

    <section class="header">
        <div>
            <h1 class="apparitionG">BOSSA NOVA</h1>
            <p id="text-header" class="apparition-top-origin">Découvrez les derniers articles de ce style chaleureux </p>
        </div>
        <img id="fond-img" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo du site" class="logo-header apparition-B">
    </section>

    <section class="podcast">
        <div class="container">
            <h1 class="titre apparitionG">Découvrez la bossa Nova</h1>
            <div class="video-container apparition-top-origin">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Efr53DWH4kE?si=b9cyliMWDE1H-Cez" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        
    </section>

    <section class="container-article">
        <h1 class="btn-card-h1">Les derniers Articles</h1>

        <div class="articles apparition-top-origin">
            @foreach($articles as $article)
                <x-card-article :article="$article"/>
            @endforeach
            <h1 class="Back-title">ARTICLES</h1>
        </div>

        <a class="btn-card-off" href="{{route('articles.index')}}">Explorer les Articles</a>
    </section>

</x-layout.app>