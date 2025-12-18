<x-layout.app :title="'Présentation'">
<section class="pres">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <div><h1 class="titre-B">Les origines </h1></div>
                <img src="{{ Vite::asset('resources/images/vinyle.png') }}" alt="Logo guitare" class="vinyle-entree">
                <i class='bx  bx-music' style='color:#ffffff'></i> 
            </div>
            <div class="flip-card-back">
                <h1 class="titre">Origines</h1>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <img src="{{ Vite::asset('resources/images/vinyle.png') }}" alt="Logo guitare" class="vinyle-entree">
            </div>
        </div>
    </div>
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
        <div class="container">
            
        </div>
</section>


</x-layout.app>
