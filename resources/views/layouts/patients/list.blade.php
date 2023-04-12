@extends('app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Liste</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                        <li class="breadcrumb-item active">Liste</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <script>
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'Félicitations',
                                            text: "{{ session('status') }}",
                                            showConfirmButton: false,
                                            timer: 2500
                                        })
                                    </script>
                                @endif

                                <div class="col-md-3">
                                    <input type="search" class='form-control' name="search" id="search" placeholder="Rechercher..." autocomplete="off">                                  
                                </div>
                                
                                <hr>
                                <div class="table-responsive col-sm-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Âge</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Profession</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Dent</th>
                                                <th scope="col">Traitement</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="alldata">
                                            @foreach ($patients as $patient)
                                                <tr>

                                                    <td>{{ $patient->nom }}</td>
                                                    <td>{{ $patient->prenom }}</td>
                                                    <td>{{ $patient->age }}</td>
                                                    <td>{{ $patient->telephone }}</td>
                                                    <td>{{ $patient->profession }}</td>
                                                    <td>{{ $patient->adresse }}</td>
                                                    <td>{{ $patient->date }}</td>
                                                    <td>{{ $patient->dent }}</td>
                                                    <td>{{ $patient->traitement }}</td>
                                                    <td>
                                                        <a href="{{ route('update', $patient->id) }}"
                                                            class="btn btn-secondary"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('delete-request', $patient->id) }}"
                                                            class="btn btn-danger btn-delete"><i
                                                                class="mdi mdi-trash-can-outline"></i></a>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tbody id="content" class="searchdata"></tbody>
                                    </table>

                                    {{ $patients->links() }}


                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


    <script>
        // Sélectionnez tous les liens de suppression avec la classe "btn-delete"
        $(".btn-delete").click(function(event) {
            // Empêchez le comportement par défaut du lien
            event.preventDefault();

            // Afficher la boîte de dialogue sweet alert 2
            Swal.fire({
                title: "Êtes-vous sûr de vouloir supprimer ce patient ?",
                text: "Cette action est irréversible !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Oui, supprimer",
                cancelButtonText: "Annuler"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Récupérer l'URL de suppression à partir de l'attribut href
                    let url = $(this).attr("href");

                    // Rediriger vers l'URL de suppression
                    window.location.href = url;
                }
            }).catch((error) => {
                console.log(error);
            });
        });


        // Recherche en temps réel des patients avec Ajax
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }
            $.ajax({
                type: 'get',
                url: '{{ URL::to('list-patient/search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#content').html(data);
                }
            });
        })
    </script>
@endsection
