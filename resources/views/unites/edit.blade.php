@extends('layouts.template')
@section('content')
<div class="container-xl">			    
    <h1 class="app-page-title">{{$unite->nom}}</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Modification</h3>
            <div class="section-intro">Chisissez l'equipe qui prendra en charge l'unité' : <b> {{$unite->nom}} </b></div>
        </div>
        <div class="col-12 col-md-5">
            <div class="app-card app-card-settings shadow-sm p-4">
                
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{route('unite.update', $unite)}}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="user_id">Deroullez la liste</label>
                        <select name="equipe_id" id="equipe_id" class="form-control" required>
                            <option value="">Selectionnez L'equipe</option>
                            @forelse($equipes as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nom}}</option>
                            @empty
                              <option value="">Aucune equipe disponible</option>
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