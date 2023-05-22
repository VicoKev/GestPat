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
                                                <label for="email">{{ __('Email') }}</label>
                                                <input type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="email" name="email"
                                                    value="{{ old('email') }}" required autocomplete="off">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">{{ __('Mot de passe') }}</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-success" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="password-confirm">{{ __('Confirmez votre mot de passe') }}</label>
                                                <div class="input-group" id="show_hide_password_confirm">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-success" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                                    </div>
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

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#password').attr("type") == "text"){
                    $('#password').attr('type', 'password');
                    $('#show_hide_password a i').addClass( "fa-eye-slash" );
                    $('#show_hide_password a i').removeClass( "fa-eye" );
                }else if($('#password').attr("type") == "password"){
                    $('#password').attr('type', 'text');
                    $('#show_hide_password a i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password a i').addClass( "fa-eye" );
                }
            });
        
            $("#show_hide_password_confirm a").on('click', function(event) {
                event.preventDefault();
                if($('#password-confirm').attr("type") == "text"){
                    $('#password-confirm').attr('type', 'password');
                    $('#show_hide_password_confirm a i').addClass( "fa-eye-slash" );
                    $('#show_hide_password_confirm a i').removeClass( "fa-eye" );
                }else if($('#password-confirm').attr("type") == "password"){
                    $('#password-confirm').attr('type', 'text');
                    $('#show_hide_password_confirm a i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password_confirm a i').addClass( "fa-eye" );
                }
            });
        });
        </script>

</body>

</html>

