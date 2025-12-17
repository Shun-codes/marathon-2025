<div>
    <form action="{{ route('articles.like', $article) }}" method="POST">
        @csrf
        <button type="submit">
            👍 Like  {{ $article->likes()->wherePivot('nature', true)->count() }}
        </button>
    </form>

    <form action="{{ route('articles.dislike', $article) }}" method="POST">
        @csrf
        <button type="submit">
            👎 Dislike {{ $article->likes()->wherePivot('nature', false)->count() }}
        </button>
    </form>
</div>
