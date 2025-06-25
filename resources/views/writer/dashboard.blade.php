<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold">Bentornata, Redattrice</h1>
                <p class="lead text-muted">Qui puoi gestire tutti gli articoli che hai scritto.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli in attesa di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles" status="in attesa di revisione" />
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles" status="pubblicati" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Articoli Respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles" status="respinti" />
            </div>
        </div>
    </div>
</x-layout>