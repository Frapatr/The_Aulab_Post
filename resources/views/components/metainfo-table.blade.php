@props(['metaInfos', 'metaType'])

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-3">#ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Q.ta Articoli</th>
                        <th scope="col">Aggiorna</th>
                        <th scope="col" class="text-center">Cancella</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($metaInfos as $metaInfo)
                        <tr>
                            <th scope="row" class="ps-3">{{ $metaInfo->id }}</th>
                            <td>{{ $metaInfo->name }}</td>
                            <td>{{ count($metaInfo->articles) }}</td>
                            <td>
                                {{-- Form di modifica --}}
                                @if($metaType == 'categorie')
                                    <form action="{{ route('admin.editCategory', $metaInfo) }}" method="POST" class="d-flex">
                                @else
                                    <form action="{{ route('admin.editTag', $metaInfo) }}" method="POST" class="d-flex">
                                @endif
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" class="form-control me-2" value="{{ $metaInfo->name }}">
                                    <button type="submit" class="btn btn-sm btn-warning">Aggiorna</button>
                                </form>
                            </td>
                            <td class="text-center">
                                {{-- Form di cancellazione --}}
                                @if($metaType == 'categorie')
                                    <form action="{{ route('admin.deleteCategory', $metaInfo) }}" method="POST">
                                @else
                                    <form action="{{ route('admin.deleteTag', $metaInfo) }}" method="POST">
                                @endif
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4">Nessun {{ $metaType }} presente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>