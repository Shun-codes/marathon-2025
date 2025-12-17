<div class="border-b py-2">
    <p>{{ $avis->contenu }} — par {{ $avis->user->name }}</p>

    @if(Auth::check() && Auth::id() === $avis->user_id)
        <form action="{{ route('avis.destroy', $avis) }}" method="POST" class="mt-1">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @endif
</div>
