<x-layout.app :title="'Présentation'">
<section class="container pres">
    <div id="pres-container">
        <h1 class="titre">La Bossa Nova</h1>
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo guitare">
        <p>Le terme Bossa Nova signifie littéralement "nouvelle vague" ou "manière neuve". Apparue à la fin des années 1950 dans les quartiers chics de Rio de Janeiro (Ipanema et Copacabana), elle est le fruit d'une fusion sophistiquée entre :
Le Samba brésilien (pour le rythme).
Le Cool Jazz américain (pour les harmonies et la structure).
C’est une musique qui se caractérise par une certaine douceur, une voix feutrée et une grande complexité harmonique.</p>
    </div>
        
</section>

<section class="pres-vinyle">
<div class="flip-card">
    <div class="flip-card-inner">
        <div class="flip-card-front">
        <h2>Recto</h2>
        <p>photo vinyle ici</p>
        </div>
        <div class="flip-card-back">
        <h2>Verso</h2>
        <p>Albums</p>
        </div>
    </div>
    </div>
</section>


</x-layout.app>
