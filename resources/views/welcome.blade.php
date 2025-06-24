<x-layout>
    @if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
    @endif
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
    <div class="row justify-content-evenly">
        @foreach ($articles as $article)
            <div class="col-12 col-md-3 my-2">
                <div class="card" style="width: 18rem;">
                    {{-- Immagine dell'articolo --}}
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Immagine dell'articolo: {{ $article->title }}"> 
                    <div class="card-body">
                        {{-- Titolo e sottotitolo --}}
                        <h5 class="card-title">{{ $article->title }}</h5> 
                        <p class="card-subtitle">{{ $article->subtitle }}</p> 
                        {{-- Categoria (cliccabile in seguito) --}}
                        <p class="small text-muted">Categoria:
                            <a href="#" class="text-capitalize text-muted">{{ $article->category->name }}</a> 
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        {{-- Autore e data --}}
                        <p class="small">Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da {{ $article->user->name }}</p> 
                        {{-- Bottone per la pagina di dettaglio --}}
                        <a href="{{route('article.show', $article)}}" class="btn btn-outline-secondary">Leggi</a> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-layout>
