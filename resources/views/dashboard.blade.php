@extends('layouts.template')
@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Controle des effectifs de la Police nationale congolaise</h6>
            </div>
        </div>
        <div class="row">
            @if (Auth::user()->role == 'Admin')
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>

                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Policiers</p>
                                        <h4 class="card-title">{{ $totalPoliciers }}</h4>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Policiers Pour le controle</p>
                                    <h4 class="card-title">{{ $totalControls }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Policiers Présents</p>
                                    <h4 class="card-title">{{ $present }} ({{ $presentPourcentage }}%)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    {{-- <i class="far fa-check-circle"></i> --}}
                                    <i class="fas fa-user-minus"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Policiers Absents</p>
                                    <h4 class="card-title">{{ $absent }} ({{ $absentPourcentage }}%)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'Admin')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Statistique des Operations de controle</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-label-info btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="min-height: 375px">
                                <canvas id="statisticsChart"></canvas>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- PANEL DEPLOIEMENT SUR TERRAIN -->
                <div class="col-md-12">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title">Deploiement des policiers sur terrain</h4>
                                <div class="card-tools">
                                    <button class="btn btn-icon btn-link btn-primary btn-xs">
                                        <span class="fa fa-angle-down"></span>
                                    </button>
                                    <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card">
                                        <span class="fa fa-sync-alt"></span>
                                    </button>
                                    <button class="btn btn-icon btn-link btn-primary btn-xs">
                                        <span class="fa fa-times"></span>
                                    </button>
                                </div>
                            </div>

                            <p class="card-category">
                                Map du deploiement des militaires sur terrain
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive table-hover table-sales">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/id.png" alt="indonesia" />
                                                        </div>
                                                    </td>
                                                    <td>Indonesia</td>
                                                    <td class="text-end">2.320</td>
                                                    <td class="text-end">42.18%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/us.png" alt="united states" />
                                                        </div>
                                                    </td>
                                                    <td>USA</td>
                                                    <td class="text-end">240</td>
                                                    <td class="text-end">4.36%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/au.png" alt="australia" />
                                                        </div>
                                                    </td>
                                                    <td>Australia</td>
                                                    <td class="text-end">119</td>
                                                    <td class="text-end">2.16%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/ru.png" alt="russia" />
                                                        </div>
                                                    </td>
                                                    <td>Russia</td>
                                                    <td class="text-end">1.081</td>
                                                    <td class="text-end">19.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/cn.png" alt="china" />
                                                        </div>
                                                    </td>
                                                    <td>China</td>
                                                    <td class="text-end">1.100</td>
                                                    <td class="text-end">20%</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="assets/img/flags/br.png" alt="brazil" />
                                                        </div>
                                                    </td>
                                                    <td>Brasil</td>
                                                    <td class="text-end">640</td>
                                                    <td class="text-end">11.63%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mapcontainer">
                                        <div id="world-map" class="w-100" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN PANEL DEPLOIEMENT SUR TERRAIN -->
        @endif

    </div>
    <div class="row">

        <!-- PANEL HISTORIQUE -->
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="card-title">Historique de controles</div>
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
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-check"></i>
                                            </button>
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
                                            <span class="badge badge-success">OK</span>
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
        <!-- FIN PANEL HISTORIQUE -->
    </div>
    </div>
@endsection
