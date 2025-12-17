<x-layout.app :title="'Contact'">
    <style>
        main{
            background-color: #006D2C;
        }
        footer.footer-section{
            margin-top: 0;
            border-top : 1px solid #777777a8;
        }
    </style>
<div class = "main-contact">
<div class="contact-wrapper">
    <div class="contact-gauche">
            <img src="{{ Vite::asset('resources/images/icon_soleil.webp') }}" alt="Soleil" class="contact-soleil">
        <h1 class="contact-title">Besoin d'informations ?</h1>
        <p class="contact-soustitle">Contactez-nous ! Notre équipe vous répond rapidement </p>
    </div>

    <form method="POST" action="#" class="form-form>
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
</div>
</x-layout.app>
