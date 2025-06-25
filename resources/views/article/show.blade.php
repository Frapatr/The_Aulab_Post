<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <header class="mb-4">
                
                    @if($article->category)
                        <a href="{{ route('article.byCategory', $article->category) }}" class="text-uppercase text-danger fw-bold text-decoration-none">{{ $article->category->name }}</a>
                    @endif
                    
                    {{-- Titolo --}}
                    <h1 class="fw-bolder mb-1 display-4">{{ $article->title }}</h1>
                    
                    {{-- Sottotitolo --}}
                    <p class="lead text-muted">{{ $article->subtitle }}</p>
                    
                    {{-- Meta Info: Autore e Data --}}
                    <div class="text-muted fst-italic mb-2">
                        Pubblicato il {{ $article->created_at->format('d F, Y') }} da
                        <a href="{{ route('article.byUser', $article->user) }}" class="text-dark text-decoration-none fw-bold">{{ $article->user->name ?? 'Autore' }}</a>
                    </div>

                    @if($article->tags->isNotEmpty())
                        <div>
                            @foreach($article->tags as $tag)
                                <a href="#" class="badge bg-secondary text-decoration-none link-light me-1">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </header>

                <figure class="mb-4">
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded shadow-sm" alt="Immagine di copertina per: {{ $article->title }}">
                </figure>

                <section class="mb-5 article-content">
                    {!! nl2br(e($article->body)) !!}
                </section>

                @if(is_null($article->is_accepted) && Auth::check() && Auth::user()->is_revisor)
                <div class="card bg-light p-4 my-5 text-center">
                    <h5 class="fw-bold">Area Revisione</h5>
                    <p class="small text-muted">Questo articolo è in attesa di approvazione.</p>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST" class="me-2">
                            @csrf
                            <button type="submit" class="btn btn-success">Accetta Articolo</button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rifiuta Articolo</button>
                        </form>
                    </div>
                </div>
                @endif
                
                <div class="text-center border-top pt-5 mt-5">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-dark">&larr; Torna a tutti gli articoli</a>
                </div>
            </div>
        </div>
    </div>
    

    <style>
        .article-content {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-size: 1.2rem;
            line-height: 2;
            color: #343a40;
        }
    </style>
</x-layout>

