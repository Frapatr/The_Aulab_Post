@props(['articles', 'status'])

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-3">#ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Creato il</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <th scope="row" class="ps-3">{{ $article->id }}</th>
                            <td>{{ Str::limit($article->title, 20) }}</td>
                            <td>{{ $article->category->name ?? 'N/D' }}</td>
                            <td>
                                @foreach($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-info text-white">Leggi</a>
                                <a href="{{ route('article.edit', $article) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4">Nessun articolo {{ $status }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>