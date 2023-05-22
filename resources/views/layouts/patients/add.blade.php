@extends('app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Ajouter</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                        <li class="breadcrumb-item active">Ajouter</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row d-flex justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>{{ __('AJOUTER') }}</h2>
                </div>
                <div class="card-body">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>

                    <form action="{{ route('add-request') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="nom" name="nom"
                                    placeholder="Nom..." required autocomplete="off">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="prenom" name="prenom"
                                    placeholder="Prénom..." required autocomplete="off">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="number" class="form-control" id="age" name="age"
                                    placeholder="Âge..." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                    placeholder="Téléphone..." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="profession" name="profession"
                                    placeholder="Profession..." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="adresse" name="adresse"
                                    placeholder="Adresse..." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="date" class="form-control" id="date" name="date" placeholder=""
                                    required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="dent" name="dent"
                                    placeholder="Dent..." required autocomplete="off">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="traitement" name="traitement" placeholder="Traitement..." rows="3" autocomplete="off"></textarea>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <button class="btn btn-primary waves-effect waves-light"
                                    type="submit">{{ __('Sauvegarder') }}</button>
                            </div>
                        </div>

                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->
@endsection
