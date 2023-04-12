<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; <strong>{{ config('app.name', 'Laravel') }}</strong>
                <script>
                    document.write(new Date().getFullYear())
                </script>. Tous Droits Réservés.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Conçu avec <span style="color: red">&hearts;</span> par <a href="{{ route('welcome') }}">VicoKev</a>
                </div>
            </div>
        </div>
    </div>
</footer>
