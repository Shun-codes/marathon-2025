<x-layout.app :title="'Page Accueil'">

<div class="articles">
    @foreach($articles as $article)
        <x-card-article :article="$article"/>
    @endforeach
</div>
</x-layout.app>