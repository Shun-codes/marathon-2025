<div id="articles-like">
    
        <form action="{{ route('articles.like', $article) }}" method="POST">
            @csrf
            <button type="submit">
                <i class='bx  bx-like' style='color:#ffffff'></i> {{ $article->likes()->wherePivot('nature', true)->count() }}
            </button>
        </form>
    

    <form action="{{ route('articles.dislike', $article) }}" method="POST">
        @csrf
        <button type="submit">
            <i class='bx  bx-dislike' style='color:#ffffff'></i>  {{ $article->likes()->wherePivot('nature', false)->count() }}
        </button>
    </form>

</div>
