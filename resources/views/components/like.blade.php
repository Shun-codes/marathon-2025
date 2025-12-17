<div>
    <form action="{{ route('articles.like', $article) }}" method="POST">
        @csrf
        <button type="submit">
            👍 Like
        </button>
    </form>

    <form action="{{ route('articles.dislike', $article) }}" method="POST">
        @csrf
        <button type="submit">
            👎 Dislike
        </button>
    </form>

    <p>👍 Likes : {{ $article->likes()->wherePivot('nature', true)->count() }}</p>
    <p>👎 Dislikes : {{ $article->likes()->wherePivot('nature', false)->count() }}</p>
</div>
