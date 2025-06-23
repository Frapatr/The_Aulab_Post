{{-- resources/views/components/footer.blade.php --}}
<footer class="bg-dark text-white text-center p-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>The Aulab Post</h5>
                <p class="small">Notizie e approfondimenti dal mondo tech e non solo, a cura della redazione di The Aulab Post.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Link Utili</h5>
                <ul class="list-unstyled">
                    {{-- Nota: alcune di queste rotte verranno create nei prossimi passaggi --}}
                    <li><a href="{{ route('homepage') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="{{ route('article.index') }}" class="text-white text-decoration-none">Tutti gli Articoli</a></li>
                    <li><a href="{{ route('careers') }}" class="text-white text-decoration-none">Lavora con noi</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contatti</h5>
                <p class="small">
                    Via Codice, 42<br>
                    00101, Web-City (LC)<br>
                    Email: info@theaulabpost.it
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <p class="small">&copy; {{ date('Y') }} The Aulab Post di Francesco Patrizio. Tutti i diritti riservati.</p>
            </div>
        </div>
    </div>
</footer>