@extends('layouts.template')
@section('content')
    <div class="col-md-6">
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <form action="{{ route('control.search') }}" method="post">
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
        </nav>
    </div>
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title">Liste de controles
                        @if (session()->has('message'))
                            <div class="text text-success">{{ session()->get('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body  mb-5">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-5">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th scope="col">Matricule</th>
                                <th scope="col">Nom, PostNom & Prénom</th>
                                <th scope="col" class="">Grade</th>
                                <th scope="col" class="">Unité BDD</th>
                                <th scope="col" class="">Unité Du Control</th>
                                <th scope="col" class="">Equipe Du Control</th>
                                <th scope="col" class="">Sexe</th>
                                <th scope="col" class="">Date Du Control</th>
                                <th scope="col" class="">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($controls as $control)
                                <tr>
                                    <td>
                                        @if ($control->statut == 'OK')
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-icon btn-round btn-danger btn-sm me-2">
                                                <i class="fa fa-ban"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="">


                                        {{ $control->policier->matricule }}

                                    </td>
                                    <td scope="row">

                                        {{ $control->policier->nom }} {{ $control->policier->postnom }}
                                        {{ $control->policier->prenom }}
                                    </td>
                                    <td class="">{{ $control->policier->grade }}</td>
                                    <td class="">{{ $control->unite->nom }}</td>
                                    <td class="">{{ $control->unite_Ctrl }}</td>
                                    <td class="">{{ $control->equipe->nom }}</td>
                                    <td class="">{{ $control->policier->sexe }}</td>
                                    <td class="">{{ $control->dateCtrl }}</td>
                                    <td class="">
                                        @if ($control->statut == 'OK')
                                            @if (Auth::user()->role == 'Admin')
                                                <span class="badge badge-danger"><a
                                                        href="{{ route('control.edit', $control->id) }}">supprimer le
                                                        control</a>
                                                </span>
                                            @endif
                                        @elseif (Auth::user()->role != 'Admin')
                                            <span class="badge badge-success"><a
                                                    href="{{ route('control.edit', $control->id) }}">Passer au
                                                    control</a></span>
                                        @endif
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td class="cell" colspan="9">
                                        <div style="text-align:center; padding:3rem">
                                            <h4><b>Aucun contrôl Effectué</b></h4>
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
