@extends('layouts.template')
@section('content')
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    @if (Auth::user()->role == 'Admin')
                        <div class="card-title">Créer une Equipr Ici! :</div>
                        <form action="{{ route('equipe.ajouter') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="input-group">
                                <input name="nom" type="text" placeholder="Déscription equipe"
                                    value="{{ old('nom') }}" class="ms-2 form-control @error('nom') is-invalid @enderror"
                                    required />
                                <select name="user_id" id="user_id" class="form-control ms-2 me-2" required>
                                    <option value="">Utilisateur Associé</option>
                                    @forelse($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @empty
                                        <option value="">Aucun user disponible</option>
                                    @endforelse
                                </select>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save save-icon"> Ajouter</i>
                                </button>
                            </div>
                        </form>
                </div>
                @endif

            </div>
            <div class="col-md-12">
                <div class="card-body col-md-7">
                    <div class="card-title">
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="container-xl">
        <h1 class="app-page-title"></h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h4 class="section-title">
                    {{ $totalEquipe }} Equipes Enregistrée(s)
                    @if (session()->has('message'))
                        <div class="text text-success">{{ session()->get('message') }}</div>
                    @endif
                    @error('nom')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </h4>
            </div>
            <div class="col-12 col-md-7">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">déscription Equipe</th>
                                        <th scope="col">Controlleur Associé</th>
                                        @if (Auth::user()->role == 'Admin')
                                            <th scope="col">Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($equipes as $equipe)
                                        <tr>
                                            <td scope="row">{{ $equipe->nom }}</td>
                                            <td class="">{{ $equipe->user->name }}</td>
                                            <td>
                                                @if (Auth::user()->role == 'Admin')
                                                    <a href="{{ route('equipe.edit', $equipe->id) }}"><span
                                                            class="badge badge-success">Modifier</span></a>
                                                    <a href="{{ route('equipe.del', $equipe->id) }}"><span
                                                            class="badge badge-danger">Supprimer</span></a>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="cell" colspan="6">
                                                <div style="text-align:center; padding: 3rem">
                                                    <h4><b>vous êtes sans Equipe</b></h4>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $equipes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
