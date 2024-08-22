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
                                    <i class="fas fa-user-check"></i>
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
                                    <i class="fas fa-user-plus"></i>
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
                                    <!-- <i class="far fa-check-circle"></i> -->
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
        </div>
        <div class="row">

            <!-- PANEL HISTORIQUE -->
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Historique du controle</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nom, PostNom & Prénom</th>
                                        <th scope="col" class="text-end">Unité du controle</th>
                                        <th scope="col" class="text-end">Date du controle</th>
                                        <th scope="col" class="text-end">Equipe du controle</th>
                                        <th scope="col" class="text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            Payment from #10231
                                        </th>
                                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                        <td class="text-end">Etat Major</td>
                                        <td class="text-end">$250.00</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">Ok</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-ba"></i>
                                            </button>
                                            Payment from #10231
                                        </th>
                                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                        <td class="text-end">Etat Major</td>
                                        <td class="text-end">$250.00</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">OK</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-icon btn-round btn-success btn-sm me-2">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            Payment from #10231
                                        </th>
                                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                        <td class="text-end">Etat Major</td>
                                        <td class="text-end">$250.00</td>
                                        <td class="text-end">
                                            <span class="badge badge-success">OK</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-icon btn-round btn-danger btn-sm me-2">
                                                <i class="fa fa-ban"></i>
                                            </button>
                                            Payment from #10231
                                        </th>
                                        <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                        <td class="text-end">Etat Major</td>
                                        <td class="text-end">$250.00</td>
                                        <td class="text-end">
                                            <span class="badge badge-danger">PAS OK</span>
                                        </td>
                                    </tr>
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
