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
                <x-articles-table :articles="$unrevisionedArticles" />
            </div>
        </div>
        
        {{-- Sezione Articoli Accettati --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Accettati</h2>
                <x-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
        
        {{-- Sezione Articoli Rifiutati --}}
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Rifiutati</h2>
                <x-articles-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>