<x-layout.app :title="'Contact'">
<div class="contact-wrapper">
    <h1 class="contact-title">Page de contact</h1>

    <form method="POST" action="#">
        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <button type="submit" class="btn-submit">Envoyer</button>
    </form>
</div>
</x-layout.app>
