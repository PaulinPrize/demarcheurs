@extends('layouts.user')
@section('content')
	<div class="card bg-light">
		<h3 class="card-header">Informations sur la catégorie</h3>
		<div class="card-body">
			<p>ID : {{ $categorie->id }}</p>
			<p>Nom : {{ $categorie->name }}</p>
            <p>Date de création : {{ $categorie->created_at }}</p>
            <p>Dernière modification : {{ $categorie->updated_at }}</p>
		</div>
	</div>
	<br/>
	<a href="{{route('categorie.index')}}" class="btn btn-md btn-warning">
        Retourner à la liste
    </a>	
@endsection






