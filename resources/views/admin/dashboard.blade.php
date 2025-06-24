<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-3 fw-bold">Bentornato, Amministratore</h1>
                <p class="lead text-muted">Gestisci le richieste di ruolo e le impostazioni della piattaforma.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        {{-- Sezione Richieste per Amministratore --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Richieste per il ruolo di Amministratore</h2>
                {{-- Usiamo il nostro nuovo componente, passando le richieste degli admin --}}
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
        
        {{-- Sezione Richieste per Revisore --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Richieste per il ruolo di Revisore</h2>
                {{-- Usiamo il nostro nuovo componente, passando le richieste dei revisori --}}
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
        
        {{-- Sezione Richieste per Redattore --}}
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 fw-bold">Richieste per il ruolo di Redattore</h2>
                {{-- Usiamo il nostro nuovo componente, passando le richieste dei redattori --}}
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>
    </div>
</x-layout>