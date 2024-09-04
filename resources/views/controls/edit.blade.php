@extends('layouts.template')
@section('content')
    <div class="container-xl">
        <h1 class="app-page-title"></h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-4">
                <h3 class="section-title">Modification</h3>
                <div class="section-intro">Modifier le statut du policier : <b> </b></div>
            </div>
            <div class="col-12 col-md-5">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-body">
                        <form class="settings-form" method="POST" action="{{ route('control.update', $control) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="statut">Deroullez la liste</label>
                                <select name="statut" id="statut" class="form-control" required>
                                    <option value="">Selectionnez le statut</option>
                                    <option value="OK">Présent</option>
                                    <option value="PAS OK">Absent</option>
                                </select>
                                <label for="statut">Unité du control</label>
                                <select name="unite_Ctrl" id="unite_Ctrl" class="form-control" required>
                                    <option value="">Selectionnez l'unité'</option>
                                    @forelse($unites as $unite)
                                        <option value="{{ $unite->nom }}">{{ $unite->nom }}</option>
                                    @empty
                                        <option value="">Aucun unite disponible pour votre equipe</option>
                                    @endforelse
                                </select>
                                <select name="province" id="province">
                                    <option value="">Province</option>
                                </select>
                                <button type="submit" class="btn btn-success">Mise à jour</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
@endsection
