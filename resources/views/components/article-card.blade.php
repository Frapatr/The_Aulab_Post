@props(['article'])

<div class="card shadow-sm border-0 h-100 article-card">
    <div class="overflow-hidden">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top article-card-img" alt="Immagine per: {{ $article->title }}">
    </div>
    <div class="card-body d-flex flex-column">
        @if($article->category)
            <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-dark text-decoration-none mb-2">{{ $article->category->name }}</a>
        @endif
        <h5 class="card-title fw-bold">{{ $article->title }}</h5>
        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($article->subtitle, 80) }}</p>
        
        @php
            $readDuration = $article->readDuration();
        @endphp
        <p class="card-text small text-muted">
            Tempo di lettura: {{ $readDuration > 0 ? $readDuration . ' min' : 'Meno di un minuto' }}
        </p>

        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-dark mt-auto align-self-start">Leggi di più</a>
    </div>
    <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center small text-muted">
        <span>Di <a href="{{ route('article.byUser', $article->user) }}" class="text-dark text-decoration-none">{{ $article->user->name ?? 'N/A' }}</a></span>
        <span>{{ $article->created_at->format('d/m/Y') }}</span>
    </div>
</div>

{{-- Stile per l'effetto zoom sull'immagine, se non già presente --}}
<style>
.article-card-img {
    transition: transform 0.3s ease-in-out;
}
.article-card:hover .article-card-img {
    transform: scale(1.05);
}
</style>