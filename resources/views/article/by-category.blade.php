<x-layout>
    {{-- Header della pagina, mostra dinamicamente il nome della categoria --}}
    <div class="container-fluid py-5 bg-light text-center border-bottom">
        <h1 class="display-4 fw-bold">Articoli per la categoria: <span class="text-dark">{{ $category->name }}</span></h1>
        <p class="lead text-muted">Esplora tutti gli articoli pubblicati in questa sezione.</p>
    </div>

    {{-- Griglia di articoli --}}
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($articles as $article)
                    <div class="col">
                        {{-- Utilizziamo il componente riutilizzabile per la card --}}
                        <x-article-card :article="$article" />
                    </div>
                @empty
                    {{-- Messaggio mostrato se non ci sono articoli per questa categoria --}}
                    <div class="col-12 text-center">
                        <div class="alert alert-warning">
                            <h4 class="alert-heading">Nessun Articolo Trovato</h4>
                            <p>Non sono ancora stati pubblicati articoli in questa categoria.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>