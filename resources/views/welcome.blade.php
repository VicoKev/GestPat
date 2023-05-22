<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="GestPat est un gestionnaire virtuel de patients qui vous permet de renseigner les informations de vos patients, d'accéder plus facilement aux données relatives à vos patients, d'optimiser la gestion de vos patients">
    <meta name="keywords" content="gestionnaire, patients, gestion, patient, gestionnaire de patients, gestionnaire virtuel de patients, gestionnaire de patients virtuel, gestionnaire de patients en ligne, gestionnaire de patients gratuit, gestionnaire de patients en ligne gratuit, gestionnaire de patients en ligne gratuit en français, gestionnaire de patients en ligne gratuit en français">
    <meta name="author" content="VicoKev">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="favicon/doctor.png" type="image/x-icon">



    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">


    <link href="w/vendor/aos/aos.css" rel="stylesheet">
    <link href="w/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="w/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="w/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="w/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="w/css/w.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="antialiased">
    <section id="hero">
        <div class="hero-container">
            <div data-aos="fade-in">
                <div class="hero-logo">
                    <img class="" src="w/img/logo-white.png" alt="logo-gestpat">
                </div>

                <h1>Bienvenue sur votre gestionnaire virtuel de patients</h1>
                <h2>Nous vous permettons <span class="typed"
                        data-typed-items="de renseigner les informations de vos patients, d'accéder plus facilement aux données relatives à vos patients, d'optimiser la gestion de vos patients"></span>
                </h2>
                @if (Route::has('login'))
                    <div class="actions">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-register">Accéder à votre espace</a>
                        @else
                            <a href="{{ route('register') }}" class="btn-register">Inscription</a>
                            <a href="{{ route('login') }}" class="btn-login">Connexion</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        Copyright &copy; <strong>GestPat</strong> 2022 -
                        <script>
                            document.write(new Date().getFullYear())
                        </script>. Tous Droits Réservés
                    </div>
                    <div class="credits">
                        Conçu avec <span style="color: red">&hearts;</span> par <a
                            href="{{ route('welcome') }}">VicoKev</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>

    <script src="w/vendor/aos/aos.js"></script>
    <script src="w/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="w/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="w/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="w/vendor/typed.js/typed.min.js"></script>
    <script src="w/js/main.js"></script>
</body>

</html>
