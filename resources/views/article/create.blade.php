{{-- resources/views/article/create.blade.php --}}
<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Inserisci un articolo</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- Il form deve permettere l'upload di file --}}
                <form class="card p-5 shadow" method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                    @csrf

                    {{-- Input per il Titolo --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Input per il Sottotitolo --}}
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{old('subtitle')}}">
                        @error('subtitle') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Input per l'Immagine --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Select per la Categoria --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control">
                            <option selected disabled>Seleziona categoria</option>
                            {{-- Cicliamo le categorie condivise globalmente --}}
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Textarea per il Corpo --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo</label>
                        <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{old('body')}}</textarea>
                        @error('body') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-outline-secondary">Inserisci articolo</button>
                        <a href="{{route('homepage')}}" class="text-secondary mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>