@extends('layouts.template')
@section('content')
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <form action="" method="post">
                        @csrf
                        @method('post')
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Recherche ..." class="form-control" />
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search search-icon"> Recherche</i>
                                </button>
                            </div>
                        </nav>
                    </form>

                    <div class="card-title">Unités dans la base des données</div>

                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Déscription de l'unité</th>
                                <th scope="col" class="">Equipe Associée</th>
                                @if (Auth::user()->role == 'Admin')
                                    <th scope="col" class="">Action</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($unites as $unite)
                                <tr>
                                    <td scope="row">{{ $unite->nom }}</td>
                                    <td class="">{{ $unite->equipe->nom }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'Admin')
                                            <a href="{{ route('unite.edit', $unite->id) }}"><span
                                                    class="badge badge-success">Affecter à une Equipe</span></a>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="cell" colspan="6">
                                        <div style="text-align:center; padding: 3rem">
                                            <h4><b>Aucune unité chargée pour votre Equipe</b></h4>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $unites->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
