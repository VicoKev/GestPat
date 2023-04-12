@extends('app')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Félicitations',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'Laravel') }}</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"><i class="mdi mdi-numeric-1-circle"></i></h4>
                    <p class="card-subtitle mb-4">Renseigner les informations de vos patients.</p>

                    <div class="chart" id="line-chart"></div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"><i class="mdi mdi-numeric-2-circle"></i></h4>
                    <p class="card-subtitle mb-4">Accéder plus facilement aux données relatives à vos patients.</p>

                    <div class="chart" id="area-chart"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"><i class="mdi mdi-numeric-3-circle"></i></h4>
                    <p class="card-subtitle mb-4">Optimiser la gestion de vos patients.</p>

                    <div class="chart" id="area-chart"></div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->
@endsection
