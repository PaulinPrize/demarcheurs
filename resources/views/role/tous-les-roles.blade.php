@extends('layouts.user')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous les rôles</h1>
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
                @foreach($roles as $role)
                    <tr id="{{ $role->id }}"> 
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td>{{$role->updated_at}}</td>
                        <td class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('role.show', $role->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir le rôle">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" href="{{route('role.edit',$role->id)}}" arget="_blank" role="button" data-toggle="tooltip" title="Modifier le rôle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" role="button" data-id="{{ $role->id }}" data-toggle="tooltip" title="Supprimer le rôle">
                                <i class="fas fa-trash"></i>
                            </a>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('role.create')}}" class="float-right btn btn-md btn-success">
        <i class="fas fa-plus"></i> Ajouter
    </a>
    
    <div class="d-flex">
        <div class="mx-auto">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('partials.script')
@endsection