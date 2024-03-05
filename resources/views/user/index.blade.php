@extends('layouts.user')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        @can('user.moderer')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Logements à modérer</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adModerationCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('user.messages')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Messages à modérer</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $messageModerationCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('user.obsoletes')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Logements obsolètes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adPerimesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-end fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <div class="row">
        @can('user.actives')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Logements actifs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adActivesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hiking fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('user.attente')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Logements en attente</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $adAttenteCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('user.obsolete')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Logements obsolètes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $addPerimesCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-end fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
        @endcan
    </div>
@endsection