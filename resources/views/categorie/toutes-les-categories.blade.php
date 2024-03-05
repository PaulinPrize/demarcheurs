@extends('layouts.user')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Toutes les catégories</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de modification</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr id="{{ $categorie->id }}"> 
                        <td>{{$categorie->name}}</td>
                        <td>{{$categorie->created_at}}</td>
                        <td>{{$categorie->updated_at}}</td>
                        <td class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('categorie.show', $categorie->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir la catégorie">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" href="{{route('categorie.edit',$categorie->id)}}" arget="_blank" role="button" data-toggle="tooltip" title="Modifier la catégorie">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('categorie.destroy', $categorie->id) }}" role="button" data-id="{{ $categorie->id }}" data-toggle="tooltip" title="Supprimer la catégorie"><i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('categorie.create')}}" class=" btn btn-md btn-warning">
        Ajouter
    </a>
    <div class="d-flex">
        <div class="mx-auto">
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@section('script')
    @include('partials.script')
@endsection