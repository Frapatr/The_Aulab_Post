<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold">Dashboard Amministratore</h1>
                <p class="lead text-muted">Gestisci le richieste di ruolo, i tag e le categorie della piattaforma.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        {{-- Sezione Richieste di Ruolo --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Richieste di Ruolo</h2>
                <h5 class="mt-4">Richieste per Amministratore</h5>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
                <h5 class="mt-4">Richieste per Revisore</h5>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
                <h5 class="mt-4">Richieste per Redattore</h5>
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>

        <hr class="my-5">

        {{-- Gestione Categorie e Tag --}}
        <div class="row">
            {{-- Colonna per le Categorie --}}
            <div class="col-12 col-md-6 mb-5 mb-md-0">
                <h2 class="mb-4 fw-bold">Gestisci le Categorie</h2>
                {{-- Form per creare nuove categorie --}}
                <form action="{{ route('admin.storeCategory') }}" method="POST" class="d-flex mb-4">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Nome nuova categoria">
                    <button type="submit" class="btn btn-dark">Crea</button>
                </form>
                {{-- Tabella delle categorie esistenti --}}
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            </div>

            {{-- Colonna per i Tag --}}
            <div class="col-12 col-md-6">
                <h2 class="mb-4 fw-bold">Gestisci i Tag</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tag" />
            </div>
        </div>
    </div>
</x-layout>