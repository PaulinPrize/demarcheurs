@extends('layouts.user')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tous utilisateurs</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr id="{{ $user->id }}"> 
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir l'utilisateur">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" href="{{route('user.edit',$user->id)}}" arget="_blank" role="button" data-toggle="tooltip" title="Modifier l'utilisateur">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" role="button" data-id="{{ $user->id }}" data-toggle="tooltip" title="Supprimer l'utilisateur">
                                <i class="fas fa-trash"></i>
                            </a>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('user.create')}}" class="float-right btn btn-md btn-success">
        <i class="fas fa-plus"></i> Ajouter
    </a>
    
    <div class="d-flex">
        <div class="mx-auto">
            {{ $users->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('partials.script')
@endsection