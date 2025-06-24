<x-layout>
    {{-- Sezione Header migliorata con testo più scuro e un sottotitolo --}}
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 fw-bold">Lavora con noi</h1>
                <p class="lead text-muted">Siamo sempre alla ricerca di talenti appassionati. Se pensi di avere le carte in regola per unirti al nostro team, compila il form qui sotto.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @auth
                    {{-- FORM PER UTENTE AUTENTICATO --}}
                    {{-- Card migliorata con ombra più pronunciata e senza bordi --}}
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-dark text-white text-center py-3">
                            <h4>Invia la tua candidatura</h4>
                        </div>
                        <div class="card-body p-lg-5">
                            <form method="POST" action="{{route('careers.submit')}}">
                                @csrf
                                {{-- Gruppi di input con icone per una UI più chiara --}}
                                <div class="mb-4">
                                    <label for="role" class="form-label">Ruolo desiderato</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            {{-- Icona SVG per il ruolo --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                                            </svg>
                                        </span>
                                        <select name="role" id="role" class="form-select form-select-lg">
                                            <option value="" selected disabled>Seleziona un ruolo...</option>
                                            @if (!Auth::user()->is_admin)
                                                <option value="admin">Amministratore</option>
                                            @endif
                                            @if (!Auth::user()->is_revisor)
                                                <option value="revisor">Revisore</option>
                                            @endif
                                            @if (!Auth::user()->is_writer)
                                                <option value="writer">Redattore</option>
                                            @endif
                                        </select>
                                    </div>
                                    @error('role') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label">Email di contatto</label>
                                    <div class="input-group">
                                         <span class="input-group-text bg-light">
                                            {{-- Icona SVG per l'email --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                                            </svg>
                                         </span>
                                        <input type="email" name="email" class="form-control form-control-lg bg-light" id="email" value="{{Auth::user()->email}}" readonly>
                                    </div>
                                    @error('email') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="form-label">Messaggio di presentazione</label>
                                     <div class="input-group">
                                         <span class="input-group-text bg-light">
                                            {{-- Icona SVG per il messaggio --}}
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                         </span>
                                        <textarea name="message" id="message" cols="30" rows="7" class="form-control form-control-lg" placeholder="Parlaci di te e delle tue competenze...">{{old('message')}}</textarea>
                                    </div>
                                    @error('message') <span class="text-danger small mt-1">{{$message}}</span> @enderror
                                </div>

                                {{-- Bottone a larghezza piena per un impatto maggiore --}}
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-dark btn-lg py-3">Invia candidatura</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    {{-- MESSAGGIO PER UTENTE NON AUTENTICATO --}}
                    <div class="card p-5 shadow-lg border-0 text-center">
                        <div class="card-body">
                             {{-- Icona lucchetto --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-lock-fill text-warning mb-3" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>
                            <h2 class="h3 fw-bold mb-3">Contenuto Riservato</h2>
                            <p class="lead text-muted">Per poter inviare la tua candidatura, devi prima accedere con il tuo account o crearne uno nuovo.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                                <a href="{{ route('login') }}" class="btn btn-dark btn-lg px-4 me-md-2">Accedi</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg px-4">Registrati</a>
                            </div>
                        </div>
                    </div>
                @endguest

            </div>
        </div>
    </div>
</x-layout>
    