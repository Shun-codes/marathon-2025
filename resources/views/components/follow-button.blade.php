@props(['utilisateur'])

@auth
    @if(auth()->id() !== $utilisateur->id)
        <div {{ $attributes }}>
            <form action="{{ route('utilisateur.suivre', $utilisateur->id) }}" method="POST">
                @csrf
                <button type="submit">
                    {{ auth()->user()->suivis->contains($utilisateur->id) ? 'Se désabonner' : "S'abonner" }}
                </button>
            </form>
        </div>
    @endif
@endauth