<x-layout>
    <div class="container-fluid px-4 py-5 text-center text-white" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1457305237443-44c3d5a30b89?q=80&w=2074&auto=format&fit=crop'); background-size: cover; background-position: center;">
        <div class="py-5">
            <h1 class="display-2 fw-bold">The Aulab Post</h1>
            <div class="col-lg-8 mx-auto">
                <p class="fs-5 mb-4 lead">Il tuo punto di riferimento quotidiano per notizie, approfondimenti e storie dal mondo digitale e non solo.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('article.index') }}" class="btn btn-light btn-lg px-4 me-sm-3 fw-bold">Leggi gli Articoli</a>
                    <a href="{{ route('careers') }}" class="btn btn-outline-light btn-lg px-4">Lavora con noi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h2 class="text-center mb-5 fw-bold">I nostri ultimi articoli</h2>
        
        @if($articles->isNotEmpty())
            <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach($articles->chunk(3) as $chunk)
                        {{-- La prima slide deve avere la classe 'active' --}}
                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="row">
                                {{-- Per ogni articolo nel chunk, creiamo una colonna --}}
                                @foreach($chunk as $article)
                                    <div class="col-12 col-md-4 mb-4">
                                        <x-article-card :article="$article" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Precedente</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Successivo</span>
                </button>
            </div>
        @else
            <div class="col-12">
                <p class="text-center h3">Nessun articolo da mostrare al momento.</p>
            </div>
        @endif
    </div>
</x-layout>