@props(['articles'])

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-3">#ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Sottotitolo</th>
                        <th scope="col">Redattore</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr>
                            <th scope="row" class="ps-3">{{ $article->id }}</th>
                            <td>{{ Str::limit($article->title, 20) }}</td>
                            <td>{{ Str::limit($article->subtitle, 30) }}</td>
                            <td>{{ $article->user->name ?? 'N/D' }}</td>
                            <td class="text-center">
                                @if (is_null($article->is_accepted))
                                    {{-- Se l'articolo è in attesa, mostra il link per leggerlo e revisionarlo --}}
                                    <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-info text-white">Leggi e Revisiona</a>
                                @else
                                    {{-- Se è già stato revisionato, mostra il form per annullare la scelta --}}
                                    <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-secondary">Rimanda in revisione</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">Nessun articolo in questa sezione.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

