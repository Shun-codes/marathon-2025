<div class="com glass">

    <h3>{{ $avis->user->name }}</h3>
    <p>{{ $avis->contenu }}</p>

    @if(Auth::check() && Auth::id() === $avis->user_id)
        <form action="{{ route('avis.destroy', $avis) }}" method="POST" class="mt-1">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endif

</div>
