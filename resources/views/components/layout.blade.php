<!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title>The Aulab Post</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <x-navbar />
    
        <div class="container-fluid">
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-md-8">
                    {{-- Messaggio di successo (verde) --}}
                    @if (session('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    {{-- Messaggio di errore/alert (rosso) --}}
                    @if (session('alert'))
                        <div class="alert alert-danger text-center">
                            {{ session('alert') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    
        <main class="flex-grow-1">
            {{ $slot }}
        </main>
    
        <x-footer />
    </body>
    </html>