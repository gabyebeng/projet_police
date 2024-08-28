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
                    @if (Auth::user()->role == 'Admin')
                        <div class="col-12 col-md-6">
                            <h3 class="section-title">Importez la liste</h3>
                            <div class="section-intro">
                                <form action="{{ route('import.unite') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="excel_file" id=""
                                            required>
                                        <input class="btn btn-primary" type="submit" value="Importer">
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 col-md-6">
                        <h3 class="section-title">Recherchez une unité</h3>
                        <div class="section-intro">
                            <form action="{{ route('unite.search') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="input-group">
                                    <input type="text" placeholder="Recherche ..." name="recherche" class="form-control"
                                        required />
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
                                    <td class="">
                                        @if ($unite->equipe->nom)
                                            {{ $unite->equipe->nom }}
                                        @endif
                                    </td>
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
