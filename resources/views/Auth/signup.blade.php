@extends('layouts.template')
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title">INSCRIPTION</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <h3 class="section-title">Liste des Utilisateurs</h3>
                @if (session()->has('message'))
                    <div class="text text-success">
                        <h3>{{ session()->get('message') }}</h3>
                    </div>
                @endif
                <div class="section-intro">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center mb-0 table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th><input type="checkbox" name="" id="select_all_ids"></th>
                                    <th scope="col">Utilisateur</th>
                                    <th scope="col" class="">Adresse Mail</th>
                                    <th scope="col" class="">Role</th>
                                    @if (Auth::user()->role == 'Admin')
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table table-bordered">
                                @forelse($users as $user)
                                    <tr>
                                        <td><input type="checkbox" name="ids" class="checkbox_ids" id="ids"></td>
                                        <td scope="row">
                                            {{ $user->name }}
                                        </td>

                                        <td class="">{{ $user->email }}</td>
                                        <td class="">{{ $user->role }}</td>
                                        @if (Auth::user()->role == 'Admin')
                                            <td>

                                                <a href="{{ route('user.del', $user->id) }}"><span
                                                        class="badge badge-danger">Supprimer</span></a>


                                            </td>
                                        @endif
                                    </tr>

                                @empty
                                    <tr>
                                        <td class="cell" colspan="6">Aucun utilisateur Ajouté</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'Admin')
                <div class="col-12 col-md-4">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action="{{ route('user.registration') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <h3>INSCRIPTION</h3>
                                    <label for="name">Nom Utilisateur</label>
                                    <input name="name" type="text" placeholder="Nom Utilisateur"
                                        class="mb-3 form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="email">Adresse Email</label>
                                    <input name="email" type="Email" placeholder="Adresse Mail"
                                        class="mb-3 form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="password">Mot de passe</label>
                                    <input name="password" type="password" placeholder="Mot de passe"
                                        class="mb-3 form-control " value="" required />
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="mb-3 form-control" required>
                                        <option value="">Selectionnez Le role</option>
                                        <option value="Admin">Administrateur</option>
                                        <option value="Manger">Manager</option>
                                        <option value="Controlleur">Controlleur</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Inscription</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            @endif

        </div><!--//row-->
    </div><!--//container-fluid-->


    <script>
        $(function(e) {
            $("select_all_ids").click(function() {
                $(".checkbox_ids").prop("checked", $(this).prop("cheked"));
            });
        });
    </script>
@endsection
