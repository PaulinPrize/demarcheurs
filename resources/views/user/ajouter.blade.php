@extends('layouts.user')
@section('content')
    <div class="card bg-light">
    	<h3 class="card-header">Ajouter un utilisateur</h3>    
    	<div class="card-body">
    		<form method="POST" action="{{ route('user.store') }}">
                @csrf
    			<div class="row">
    				<div class="form-group col-md-6">
                		<label for="name">Nom *</label>
                		<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"/>
                		@if ($errors->has('name'))
        					<div class="invalid-feedback">
            					{{ $errors->first('name') }}
        					</div>
    					@endif
                	</div>
                	<div class="form-group col-md-6">
                		<label for="email">Email *</label>
                		<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"/>
                		@if ($errors->has('email'))
        					<div class="invalid-feedback">
            					{{ $errors->first('email') }}
        					</div>
    					@endif
                	</div>
    			</div>
    			<div class="row">
    				<div class="form-group col-md-6">
                		<label for="password">Mot de passe *</label>
                		<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"/>
                		@if ($errors->has('password'))
        					<div class="invalid-feedback">
            					{{ $errors->first('password') }}
        					</div>
    					@endif
                	</div>
                	<div class="form-group col-md-6">
                		<label for="confirmation">Confirmer *</label>
                		<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="confirmation"/>
                	</div>
    			</div>
    			<div class="row">
    				<div class="form-group col-md-6">
                		<label for="telephone">Téléphone</label>
                		<input id="telephone" type="number" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone"/>
                		@if ($errors->has('telephone'))
        					<div class="invalid-feedback">
            					{{ $errors->first('telephone') }}
        					</div>
    					@endif
                	</div>
                	<div class="form-group col-md-6">
                		<label for="role">Role *</label>
                		<select class="custom-select" name="role" id="role">
                        	@foreach ($roles as $role)
                            	<option value="{{ $role->id }}" @if($loop->first) selected @endif>{{ $role->name }}</option>
                        	@endforeach
                    	</select>
                	</div>
    			</div>
				<input type="hidden" class="form-control" name="photo" id="photo"  value="images.png"/>
                <button type="submit" class="btn btn-warning float-right" style="color:white;">Enregistrer</button>
    		</form>
    	</div>
    </div>
@endsection