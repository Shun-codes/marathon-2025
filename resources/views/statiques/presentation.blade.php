<x-layout.app :title="'Présentation'">
<section class="pres">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <div><img src="{{ Vite::asset('resources/images/pochette.png') }}" alt="Logo guitare"></div>
                <img src="{{ Vite::asset('resources/images/disque.png') }}" alt="Logo guitare" class="vinyle-entree">
                <i class='bx  bx-music' style='color:#ffffff'></i> 
            </div>
            <div class="flip-card-back">
                <h1 class="titre">Origines</h1>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <audio controls="" src="https://comptines.tv/musiques/au_clair_de_la_lune.mp3"></audio>
                <img src="{{ Vite::asset('resources/images/disque.png') }}" alt="Logo guitare">
            </div>
        </div>
    </div>
    <div id="pres-container" class="apparitionD">
        <h1 class="titre">La Bossa Nova</h1>
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo guitare">
        <p>Le terme Bossa Nova signifie littéralement "nouvelle vague" ou "manière neuve". Apparue à la fin des années 1950 dans les quartiers chics de Rio de Janeiro (Ipanema et Copacabana), elle est le fruit d'une fusion sophistiquée entre :
Le Samba brésilien (pour le rythme).
Le Cool Jazz américain (pour les harmonies et la structure).
C’est une musique qui se caractérise par une certaine douceur, une voix feutrée et une grande complexité harmonique.</p>
    </div>
        
</section>
<section id="styles-container">
    <div class="style-container apparitionG">
        <img src="{{ Vite::asset('resources/images/Chant.png') }}" alt="Image chant">
        <div>
            <h1 class="S-titre">Le Chant</h1>
            <p>Un style "parlé-chanté", doux, sans vibrato excessif, presque chuchoté à l'oreille.</p>
        </div>
    </div>
    <div class="style-container apparitionG">
        <img src="{{ Vite::asset('resources/images/Chant.png') }}" alt="Guitare">
        <div>
            <h1 class="S-titre">Guitare</h1>
            <p>La "batida" créée par João Gilberto : une main droite qui alterne les basses et les accords syncopés.</p>
        </div>
    </div>
    <div class="style-container apparitionG">
        <img src="{{ Vite::asset('resources/images/harmonie.png') }}" alt="L'Harmonie">
        <div>
            <h1 class="S-titre">L'Harmonie</h1>
            <p>Très riche, utilisant des accords de septième, neuvième et treizième, typiques du Jazz.</p>
        </div>
    </div>

</section>
    <section class="podcast">
        <div class="container">
            <h1 class="titre apparitionG">Découvrez notre interview</h1>
            <div class="video-container apparition-top-origin">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Efr53DWH4kE?si=b9cyliMWDE1H-Cez" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div> 
</section>


</x-layout.app>
