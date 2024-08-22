@extends('layouts.template')
@section('content')
<div class="container-xl">			    
    <h1 class="app-page-title">{{$equipe->nom}}</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Modification</h3>
            <div class="section-intro">Chisissez le nouveau utulisateur pour l'equipe : <b> {{$equipe->nom}} </b></div>
        </div>
        <div class="col-12 col-md-5">
            <div class="app-card app-card-settings shadow-sm p-4">
                
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{route('equipe.update', $equipe)}}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="user_id">Deroullez la liste</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Selectionnez L'utilisateur</option>
                            @forelse($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @empty
                              <option value="">Aucun user disponible</option>
                            @endforelse
                        </select>
                        </div>
                        <button type="submit" class="btn btn-success" >Mise à jour</button>
                    </form>
                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div><!--//container-fluid-->
@endsection