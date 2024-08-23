@extends('layouts.template')
@section('content')
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <form action="{{ route('policier.search') }}" method="post">
                        @csrf
                        @method('POST')
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Recherche ..." name="recherche" class="form-control" />
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search search-icon"> Recherche</i>
                                </button>
                            </div>
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
