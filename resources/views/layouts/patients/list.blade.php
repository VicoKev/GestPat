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
                    <div class="container-fluid">
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
                                <div class="col-sm-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th class="d-none d-md-table-cell" scope="col">Prénom</th>
                                                <th class="d-none d-md-table-cell" scope="col">Âge</th>
                                                <th class="d-none d-md-table-cell" scope="col">Téléphone</th>
                                                <th class="d-none d-md-table-cell" scope="col">Profession</th>
                                                <th class="d-none d-md-table-cell" scope="col">Adresse</th>
                                                <th class="d-none d-md-table-cell" scope="col">Date</th>
                                                <th class="d-none d-md-table-cell" scope="col">Dent</th>
                                                <th class="d-none d-md-table-cell" scope="col">Traitement</th>
                                                <th class="d-none d-md-table-cell" colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="alldata">
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td class="align-middle patient-name p-2">{{ $patient->nom }} 
                                                        <button type="button" class="btn btn-primary btn-sm float-right d-sm-block d-md-none collapse-btn" data-toggle="collapse" 
                                                        data-target="#patient{{ $patient->id }}" aria-expanded="false" 
                                                        aria-controls="patient{{ $patient->id }}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->prenom }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->age }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->telephone }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->profession }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->adresse }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->date }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->dent }}</td>
                                                    <td class="d-none d-md-table-cell p-2">{{ $patient->traitement }}</td>
                                                    
                                                    <td class="d-none d-md-table-cell">
                                                        <a href="{{ route('update', $patient->id) }}" class="btn btn-primary"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </td>
                                                    <td class="d-none d-md-table-cell">
                                                        <a href="{{ route('delete-request', $patient->id) }}" class="btn btn-danger btn-delete"><i
                                                                class="mdi mdi-trash-can-outline"></i></a>
                                                    </td>
                                                </tr>
                                                <tr id="patient{{ $patient->id }}" class="collapse">
                                                    <td colspan="12">
                                                        <div class="card-deck">
                                                            <div class="card px-2">
                                                                <p><strong>Prénom :</strong> {{ $patient->prenom }}</p>
                                                                <p><strong>Âge :</strong> {{ $patient->age }}</p>
                                                                <p><strong>Téléphone :</strong> {{ $patient->telephone }}</p>
                                                                <p><strong>Profession :</strong> {{ $patient->profession }}</p>
                                                                <p><strong>Adresse :</strong> {{ $patient->adresse }}</p>
                                                                <p><strong>Date :</strong> {{ $patient->date }}</p>
                                                                <p><strong>Dent :</strong> {{ $patient->dent }}</p>
                                                                <p><strong>Traitement :</strong> {{ $patient->traitement }}</p>
                                                                <p><strong>Actions :</strong> <a href="{{ route('update', $patient->id) }}" class="btn btn-primary"><i
                                                                    class="mdi mdi-pencil-outline"></i></a> <a href="{{ route('delete-request', $patient->id) }}" class="btn btn-danger btn-delete"><i
                                                                    class="mdi mdi-trash-can-outline"></i></a>
                                                                </p>                                                             
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tbody id="content" class="searchdata"></tbody>
                                    </table>

                                    <style>                                     
                                        @media (max-width: 768px) {
                                            .table-responsive {
                                                overflow-x: auto;
                                            }
                                            
                                            .table td,
                                            .table th {
                                                white-space: nowrap;
                                            }
                                        }
                                    </style>
                                    
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
                confirmButtonColor: '#f85359',
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
