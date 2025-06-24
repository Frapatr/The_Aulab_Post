@props(['article'])
<div class="card shadow-sm border-0 h-100">
    
    {{-- Immagine dell'articolo --}}
    @if($article->image)
        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Immagine di copertina per: {{ $article->title }}">
    @else
        {{-- Immagine placeholder se non c'è un'immagine caricata --}}
        <img src="https://placehold.co/600x400/e9ecef/6c757d?text=Immagine+non+disponibile" class="card-img-top" alt="Immagine non disponibile">
    @endif

    <div class="card-body d-flex flex-column">
        {{-- Categoria --}}
        <div class="mb-2">
            @if($article->category)
                <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-dark text-decoration-none">{{ $article->category->name }}</a>
            @else
                <span class="badge bg-secondary">Non categorizzato</span>
            @endif
        </div>
        
        {{-- Titolo e Sottotitolo --}}
        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($article->subtitle, 80) }}</p>
        
        {{-- Bottone Leggi di più --}}
        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-dark mt-auto align-self-start">Leggi di più</a>
    </div>

    {{-- Dettagli finali nel footer della card --}}
    <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center small text-muted">
        <span>Di 
            <a href="{{ route('article.byUser', $article->user) }}" class="text-dark text-decoration-none">{{ $article->user->name ?? 'N/A' }}</a>
        </span>
        <span>{{ $article->created_at->format('d/m/Y') }}</span>
    </div>
</div>