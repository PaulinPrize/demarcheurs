@extends('layouts.user')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les logements</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($logements as $logement)
                    <tr id="{{ $logement->id }}"> 
                        <td>{{$logement->title}}</td>
                        <td>{{$logement->texte}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        <div class="mx-auto">
            {{ $logements->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('partials.script')
@endsection