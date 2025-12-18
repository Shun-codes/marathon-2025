<x-layout.app :title="'Page Introuvable'">

    <style>
        footer.footer-section{
            margin-top: 0;
            border-top : 1px solid #777777a8;
        }
    
    </style>

    <div class="bg-sun"></div>

    <div class="error-container">
        
        <img src="{{ Vite::asset('resources/images/icon_404.png') }}" alt="Logo O Sol Sound 404" class="error-logo">

        <h2 class="error-message">OUPS.. le rythme s’est arrété là..</h2>

        <a href="{{ route('home') }}" class="btn-home-404">
            Retour à l'accueil
        </a>

    </div>

</x-layout.app>
