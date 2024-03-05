@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('public/img/speaker.png') }}" alt="">
                </div>
                <div class="col-md-8">
                    <h1 class="display-4">Bravo</h1>
                    <p class="lead">Votre logement a bien été pris en compte, et sera publié après modération.</p>
                </div>
            </div>
        </div>
    </div>
@endsection