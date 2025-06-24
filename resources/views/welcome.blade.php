<x-layout>
    {{-- Hero Section per la Homepage --}}
    <div class="container-fluid py-5 bg-light text-center border-bottom">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="display-2 fw-bold">The Aulab Post</h1>
                <p class="lead text-muted">Il tuo punto di riferimento quotidiano per notizie, approfondimenti e storie dal mondo digitale e non solo.</p>
                <p>
                    <a href="{{ route('article.index') }}" class="btn btn-dark my-2">Leggi tutti gli articoli</a>
                    <a href="{{ route('careers') }}" class="btn btn-outline-secondary my-2">Lavora con noi</a>
                </p>
            </div>
        </div>
    </div>

    {{-- Sezione "Ultimi Articoli" --}}
    <div class="album py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">I nostri ultimi articoli</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($articles as $article)
                    <div class="col">
                        {{-- Utilizzo del nuovo componente Article Card --}}
                        <x-article-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center h3">Nessun articolo da mostrare al momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
