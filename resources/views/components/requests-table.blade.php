@props(['roleRequests', 'role'])

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-3">#ID</th>
                        <th scope="col">Nome Utente</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roleRequests as $user)
                        <tr>
                            <th scope="row" class="ps-3">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                {{-- Lo @switch seleziona la rotta corretta in base al ruolo --}}
                                @switch($role)
                                    @case('amministratore')
                                        <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">Attiva Amministratore</button>
                                        </form>
                                        @break
                                    @case('revisore')
                                        <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">Attiva Revisore</button>
                                        </form>
                                        @break
                                    @case('redattore')
                                        <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">Attiva Redattore</button>
                                        </form>
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4">Nessuna richiesta in attesa per questo ruolo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>