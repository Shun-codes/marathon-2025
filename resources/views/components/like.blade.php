<div>
    <form action="{{ route('articles.like', $article) }}" method="POST">
        @csrf
        @if($article->activeLikes->contains(auth()->user()))
            <button type="submit" class="btn btn-danger">Je n'aime plus</button>
        @else
            <button type="submit" class="btn btn-primary">J’aime</button>
        @endif
    </form>

    <p>{{ $article->activeLikes()->count() }}</p>
</div>
