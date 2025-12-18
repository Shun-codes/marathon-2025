@if(Auth::check())
    <div class="glass form-com" >
        <h3>Donner votre avis !</h2>
        <form id="commentaire-form" action="{{ route('avis.store', $article) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="contenu" required id="commentaireTarea" placeholder="Ajouter un commentaire" ></textarea>
            <button type="submit" class="btn">
                Ajouter un commentaire
            </button>
        </form>
    </div>
@endif
