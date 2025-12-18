<div class="border-b py-2">
    <h3 class="S-titre">{{ $avis->user->name }}</h3>
    <p>{{ $avis->contenu }}</p>

    @if(Auth::check() && Auth::id() === $avis->user_id)
        <form action="{{ route('avis.destroy', $avis) }}" method="POST" class="mt-1">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endif
</div>
