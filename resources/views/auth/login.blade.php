<x-layout>
    <div class="container-fluid p-5 bg-light border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 fw-bold">Accedi</h1>
                <p class="lead text-muted">Bentornato! Inserisci le tue credenziali per continuare.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Indirizzo Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" value="{{ old('email') }}">
                                @error('email') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password">
                                @error('password') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark btn-lg py-3">Accedi</button>
                            </div>
                            <p class="text-center small mt-4">
                                Non hai un account? <a href="{{ route('register') }}">Registrati ora</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>