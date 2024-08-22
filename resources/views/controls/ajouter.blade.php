@extends('layouts.template')
@section('content')
<div class="container-xl">			    
    <h1 class="app-page-title">Controls</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">passer un control</h3>
            <div class="section-intro">Confirmer l'unité et la presence du policier pour le control</div>
        </div>
        <div class="col-8 col-md-6">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="">
                        @csrf
                        @method('POST')

                        @if(session()->has('message'))
                            <div>{{$message}}</div>
                        @endif

                        <div class="md-3">
                            <label for="setting-input-1" class="form-label">Matricule du policier<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                <circle cx="8" cy="4.5" r="1"/>
                                </svg></span>
                            </label>
                            <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    @forelse($controls as $control)
                                        <tr>
                                            <th scope="col">Matricule</th>
                                            <th scope="col">: {{$control->policier->matricule}}</th>
                                        <tr>
                                            <th scope="col">Nom, PostNom & Prénom</th>
                                            <th scope="col">: {{$policier->nomm}} {{$policier->postnom}} {{$policier->prenom}}</th>
                    
                                        </tr>
                                        <tr>
                                            <th scope="col">Grade</th>
                                            <th scope="col">:{{$policier->grade}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Unité</th>
                                            <th scope="col">:{{$policier->unite->nom}}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Unité Du Control</th>
                                            <th scope="col">
                                            <select name="departement_id" id="departement_id" class="form-control" >
                                            <option value="">Selectionnez l'unité du control</option>
                                                @forelse($unites as $unite)
                                                <option value="{{$unite->nom}}">{{$unite->nom}}</option>
                                                @empty
                                                        <option value="">Aucun departement n'est disponible</option>
                                                @endforelse
                                            </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Sexe</th>
                                            <th scope="col">:</th>
                                        </tr>
                                    @empty
                                        <tr></tr>
                                    @endforelse
                                </thead>
                                
                                <tbody>
                                </tbody>
                            </table>
                        <button type="submit" class="btn btn-primary mt-2" >Valider Présence</button>
                    </form>
                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div><!--//container-fluid-->
@endsection