<x-layout>
    {{-- Header della pagina Indice --}}
    <div class="container-fluid py-5 bg-light text-center border-bottom">
        <h1 class="display-4 fw-bold">Tutti i nostri Articoli</h1>
        <p class="lead text-muted">Esplora l'archivio completo delle nostre pubblicazioni.</p>
    </div>

    {{-- Griglia di articoli --}}
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($articles as $article)
                    <div class="col">
                        {{-- Utilizzo del nuovo componente Article Card --}}
                        <x-article-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center h3">Nessun articolo trovato.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>