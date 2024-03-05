@extends('layouts.user')
@section('content')
	<div class="card bg-light">
		<h3 class="card-header">Modifier la  catégorie</h3>
		<div class="card-body">
			<form method="POST" action="{{ route('categorie.update', $categorie->id) }}">
				@method('PUT')
                @csrf
                <div class="row">
					<div class="form-group col-md-12">
                		<label for="name">Nom de la catégorie *</label>
                		<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$categorie->name}}"/>
                		@if ($errors->has('name'))
        					<div class="invalid-feedback">
            					{{ $errors->first('name') }}
        					</div>
    					@endif
                	</div>
				</div>
				<button type="submit" class="btn btn-warning " style="color:white;">Enregistrer</button>
			</form>
		</div>
		
	</div>
@endsection