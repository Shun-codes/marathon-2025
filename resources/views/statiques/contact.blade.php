<x-layout.app :title="'Contact'">
    <h1>Page de contact</h1>

    <form method="POST" action="#">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <button type="submit">Envoyer</button>
    </form>
</x-layout.app>
