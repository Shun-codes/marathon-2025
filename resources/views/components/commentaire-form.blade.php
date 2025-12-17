@if(Auth::check())
    <form action="{{ route('avis.store', $article) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="contenu" required class="w-full border rounded p-2"></textarea>
        <button type="submit" class="mt-2 bg-blue-600 text-white px-3 py-1 rounded">
            Ajouter un commentaire
        </button>
    </form>
@endif
