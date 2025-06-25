<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 fw-bold">Modifica Articolo</h1>
                <p class="lead text-muted">Aggiorna i dettagli del tuo articolo.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4>Dettagli Articolo</h4>
                    </div>
                    <div class="card-body p-lg-5">
                        <form method="POST" action="{{ route('article.update', $article) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="title" value="{{ $article->title }}">
                                @error('title') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="subtitle" class="form-label">Sottotitolo</label>
                                <input type="text" name="subtitle" class="form-control form-control-lg" id="subtitle" value="{{ $article->subtitle }}">
                                @error('subtitle') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Immagine Attuale</label>
                                <img src="{{ Storage::url($article->image) }}" alt="Immagine attuale" class="img-fluid rounded shadow-sm mb-2" style="max-height: 200px;">
                                <label for="image" class="form-label">Sostituisci Immagine</label>
                                <input type="file" name="image" class="form-control form-control-lg" id="image">
                                @error('image') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label">Categoria</label>
                                <select name="category" id="category" class="form-select form-select-lg">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($article->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" name="tags" class="form-control form-control-lg" id="tags" value="{{ $article->tags->pluck('name')->implode(', ') }}">
                                <div class="form-text">Dividi ogni tag con una virgola.</div>
                                @error('tags') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="body" class="form-label">Corpo dell'Articolo</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control form-control-lg">{{ $article->body }}</textarea>
                                @error('body') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg py-3">Salva Modifiche</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
