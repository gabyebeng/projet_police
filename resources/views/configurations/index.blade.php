@extends('layouts.template')
@section('content')
    <div class="container-xl mb-2">
        {{-- <h1 class="app-page-title">Liste des policiers de la base de données</h1> --}}
        <hr class="mb-2">
        <div class="card">
            <div class="card-header">
                <h3>Configurations Générales</h3>
            </div>
            <div class="card-body">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-6">
                        <h3 class="section-title">Importez la liste des unités</h3>
                        <div class="section-intro">
                            <form action="{{ route('charger.unite') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="input-group">
                                    <input class="form-control" type="file" name="excel_file" id="" required>
                                    <input class="btn btn-primary" type="submit" value="Importer">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="section-title">Importez la liste des policiers</h3>
                        <div class="section-intro">
                            <form action="{{ route('configuration.import') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="input-group">
                                    <input class="form-control" type="file" name="excel_file" id="" required>
                                    <input class="btn btn-primary" type="submit" value="Importer">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
@endsection
