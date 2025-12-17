<x-layout.app :title="'Page Accueil'">

<section class="header">
    <div>
        <h1>BOSSA NOVA</h1>
        <p id="text-header">Découvrez les derniers articles de ce style chaleureux </p>
    </div>
    <img id="fond-img" src="{{ Vite::asset('resources/images/Logo.png') }}" alt="Logo du site" class="logo-header">
</section>

<section class="container">
    <h1 class="titre">Les derniers Articles</h1>
    

    <div class="articles">
        @foreach($articles as $article)
            <x-card-article :article="$article"/>
        @endforeach
    </div>
</section>

</x-layout.app>