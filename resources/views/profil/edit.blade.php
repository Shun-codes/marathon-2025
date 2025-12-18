<x-layout.app title="Modifier mon profil">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- champ Nom --}}
        <div>
            <label>Nom :</label>
            <input type="text" name="name" value="{{ old('name', $utilisateur->name) }}">
        </div>

        {{-- champ avatar --}}
        <div style="margin-top: 20px;">
            <label>Photo de profil :</label>
            <input type="file" name="avatar">
            <p>Aperçu actuel :</p>
            <img src="{{ $utilisateur->avatar }}" alt="Avatar" style="width: 80px; border-radius: 50%;">
        </div>

        <button type="submit" style="margin-top: 20px;">Mettre à jour</button>
    </form>
</x-layout.app>