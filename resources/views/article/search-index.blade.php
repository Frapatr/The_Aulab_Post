<x-layout>
    {{-- Header della pagina di ricerca --}}
    <div class="container-fluid py-5 bg-light text-center border-bottom">
        <h1 class="display-4 fw-bold">Risultati per: <span class="text-dark">"{{ $query }}"</span></h1>
    </div>

    {{-- Griglia di articoli trovati --}}
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse($articles as $article)
                <div class="col">
                    <x-article-card :article="$article" />
                </div>
            @empty
                {{-- Messaggio mostrato se non ci sono risultati --}}
                <div class="col-12 text-center">
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Nessun Risultato</h4>
                        <p>La tua ricerca per "{{ $query }}" non ha prodotto risultati. Prova con termini differenti.</p>
                        <a href="{{ route('homepage') }}" class="btn btn-dark">Torna alla Home</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
