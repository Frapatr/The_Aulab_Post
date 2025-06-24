<x-layout>
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center">
                    {{-- Categoria --}}
                    @if($article->category)
                        <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-dark text-decoration-none mb-3">{{ $article->category->name }}</a>
                    @endif
                    {{-- Titolo --}}
…    <style>
        .article-body {
            line-height: 1.8;
        }
    </style>
</x-layout>

