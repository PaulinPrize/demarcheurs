@extends('layouts.user')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toutes les régions</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Code</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de modification</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($regions as $region)
                    <tr id="{{ $region->id }}"> 
                        <td>{{$region->name}}</td>
                        <td>{{$region->slug}}</td>
                        <td>{{$region->code}}</td>
                        <td>{{$region->created_at}}</td>
                        <td>{{$region->updated}}</td>
                        <td class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('region.show', $region->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir la région">
                                <i class="fas fa-eye"></i>
                            </a>                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        <div class="mx-auto">
            {{ $regions->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('partials.script')
@endsection