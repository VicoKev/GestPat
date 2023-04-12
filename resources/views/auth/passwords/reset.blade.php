@include('partials.doc_head')


<body>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Félicitations',
                text: '{{ session('status') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif


    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="{{ route('welcome') }}"
                                                class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-alpha-g-box"></i>
                                                <b>{{ config('app.name', 'Laravel') }}</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Réinitialisation du mot de passe !</h1>
                                        <p class="text-muted mb-4">Remplissez tous les champs pour la création de votre nouveau mot de passe.</p>
                                        <form action="{{ route('reset-password-request') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">
                                            
                                            <div class="form-group">
                                                <input type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="Votre email..."
                                                    value="{{ old('email') }}" required autocomplete="off">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password"
                                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                                        id="password" name="password"
                                                        placeholder="Votre mot de passe..." required
                                                        autocomplete="off">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="password-confirm" name="password_confirmation"
                                                        placeholder="Répétez votre mot de passe..." required
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-success btn-block waves-effect waves-light">{{ __('Valider') }}</button>

                                        </form>

                                        
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    @include('partials.doc_down')

</body>

</html>

