@extends('layouts.template')
@section('content')
    <div class="container-xl mb-2">
        {{-- <h1 class="app-page-title">Liste des policiers de la base de données</h1> --}}
        <hr class="mb-2">
        <div class="card">
            <div class="card-header">
                <h3>Operations Disponibles</h3>
            </div>
            <div class="card-body">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-6">
                        <h3 class="section-title">Importez la liste</h3>
                        <div class="section-intro">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="input-group"><input class="form-control" type="file" name="excel_file"
                                        id="">
                                    <input class="btn btn-primary" type="submit" value="Importer">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="section-title">Recherchez un policier</h3>
                        <div class="section-intro">
                            <form action="{{ route('policier.search') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="input-group">
                                    <input type="text" placeholder="Recherche ..." name="recherche"
                                        class="form-control" />
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-search search-icon"> Recherche</i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->

    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <form action="{{ route('policier.search') }}" method="post">
                        @csrf
                        @method('POST')
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">

                        </nav>
                    </form>

                    <div class="card-title">Policiers dans la base des données</div>
                </div>


            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Matricule</th>
                                <th scope="col">Nom, PostNom & Prénom</th>
                                <th scope="col" class="">Unité BDD</th>
                                <th scope="col" class="">Grade</th>
                                <th scope="col" class="">Sexe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($policiers as $policier)
                                <tr>
                                    <td class="">
                                        {{ $policier->matricule }}

                                    </td>
                                    <td scope="row">

                                        {{ $policier->nom }} {{ $policier->postnom }} {{ $policier->prenom }}
                                    </td>

                                    <td class="">{{ $policier->unite->nom }}</td>
                                    <td class="">{{ $policier->grade }}</td>
                                    <td class="">{{ $policier->sexe }}</td>
                                </tr>

                            @empty
                                <tr>
                                    <td class="cell" colspan="6">
                                        <div style="text-align:center; padding:3rem">
                                            <h4><b>Aucun policier Ajouté</b></h4>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
