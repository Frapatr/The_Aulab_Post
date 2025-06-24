<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 fw-bold">Crea un Account</h1>
                <p class="lead text-muted">Unisciti alla nostra community per scrivere articoli e interagire.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card shadow-lg border-0">
                     <div class="card-header bg-dark text-white text-center py-3">
                        <h4>Registrati</h4>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome Utente</label>
                                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name') }}">
                                @error('name') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                            </div>
                             <div class="mb-3">
                                <label for="email" class="form-label">Indirizzo Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}">
                                @error('email') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password">
                                @error('password') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                            </div>
                             <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Conferma Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation">
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg py-3">Registrati</button>
                            </div>
                             <p class="text-center small mt-4">
                                Hai già un account? <a href="{{ route('login') }}">Accedi</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>