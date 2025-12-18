<x-layout.app title="Modifier mon profil">
<div class="edit-profil-section">
        
        <div class="edit-profil-container">
            
            <h1 class="edit-profil-title">Modifier mon profil</h1>

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="edit-profil-form">
                @csrf
                @method('PUT')

                <div class="edit-git profil-group">
                    <label>Nom :</label>
                    <input type="text" name="name" value="{{ old('name', $utilisateur->name) }}" class="edit-profil-input">
                </div>

                <div class="edit-profil-group">
                    <label>Photo de profil :</label>
                    <input type="file" name="avatar" class="edit-profil-input" style="padding: 10px;">
                    
                    <div class="edit-profil-avatar-preview-container">
                        <img src="{{ $utilisateur->avatar }}" alt="Avatar" class="edit-profil-avatar-preview-img">
                        <span class="edit-profil-avatar-preview-text">Aperçu de votre image actuelle</span>
                    </div>
                </div>

                <button type="submit" class="edit-profil-btn">Mettre à jour</button>
            </form>

        </div>
    </div>
</x-layout.app>