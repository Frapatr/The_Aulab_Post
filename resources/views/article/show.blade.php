<x-layout>
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center">
                    {{-- Categoria --}}
                    @if($article->category)
                        <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-dark text-decoration-none mb-3">{{ $article->category->name }}</a>
                    @endif
                    {{-- Titolo --}}
                    <h1 class="display-4 fw-bold">{{ $article->title }}</h1>
                    {{-- Sottotitolo --}}
                    <p class="lead text-muted">{{ $article->subtitle }}</p>
                    {{-- Informazioni Autore e Data --}}
                    <div class="d-flex justify-content-center align-items-center small text-muted mt-3">
                        <span>Scritto il {{ $article->created_at->format('d F Y') }} da</span>
                        <a href="{{ route('article.byUser', $article->user) }}" class="ms-1 text-dark text-decoration-none fw-bold">{{ $article->user->name ?? 'Autore' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Immagine di copertina --}}
    <div class="container-fluid p-0 mb-5">
        <img src="{{ Storage::url($article->image) }}" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;" alt="Immagine di copertina per: {{ $article->title }}">
    </div>

    {{-- Corpo dell'articolo --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="article-body fs-5" style="line-height: 1.8;">
                    {!! nl2br(e($article->body)) !!}
                </div>

                {{-- Sezione Azioni del Revisore (per Sara) --}}
                @if(is_null($article->is_accepted) && Auth::check() && Auth::user()->is_revisor)
                <div class="d-flex justify-content-center my-5">
                    <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-success">Accetta Articolo</button>
                    </form>
                    <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-danger">Rifiuta Articolo</button>
                    </form>
                </div>
                @endif

                <hr class="my-5">
                <div class="text-center">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-dark">Torna a tutti gli articoli</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>

