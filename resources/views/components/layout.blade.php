<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>The Aulab Post</title>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    {{-- Includiamo la navbar --}}
    <x-navbar />

    {{-- Questa sarà l'area principale che crescerà per riempire lo spazio --}}
    <main class="flex-grow-1">
        
        {{-- Contenitore per i messaggi di alert --}}
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    @if (session('message'))
                        <div class="alert alert-success text-center shadow-sm">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('alert'))
                        <div class="alert alert-danger text-center shadow-sm">
                            {{ session('alert') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Qui verrà inserito il contenuto di ogni pagina --}}
        {{ $slot }}

    </main>

    {{-- Includiamo il footer --}}
    <x-footer />
    
</body>
</html>