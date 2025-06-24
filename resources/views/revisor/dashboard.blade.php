<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold">Bentornata, Revisore</h1>
                <p class="lead text-muted">Ecco gli articoli da controllare e gestire.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        {{-- Sezione Articoli da Revisionare --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli da Revisionare</h2>
                @if($unrevisionedArticles->isNotEmpty())
                    <x-articles-table :articles="$unrevisionedArticles" />
                @else
                    <div class="alert alert-info text-center">
                        <h4 class="alert-heading">Ottimo lavoro!</h4>
                        <p>Non ci sono nuovi articoli da revisionare al momento. Attendi che i redattori ne scrivano di nuovi.</p>
                    </div>
                @endif
            </div>
        </div>
        
        {{-- Sezione Articoli Accettati --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Accettati</h2>
                 @if($acceptedArticles->isNotEmpty())
                    <x-articles-table :articles="$acceptedArticles" />
                @else
                    <div class="alert alert-light text-center">
                        <p class="mb-0">Nessun articolo è stato ancora accettato.</p>
                    </div>
                @endif
            </div>
        </div>
        
        {{-- Sezione Articoli Rifiutati --}}
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Rifiutati</h2>
                 @if($rejectedArticles->isNotEmpty())
                    <x-articles-table :articles="$rejectedArticles" />
                @else
                     <div class="alert alert-light text-center">
                        <p class="mb-0">Nessun articolo è stato ancora rifiutato.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
