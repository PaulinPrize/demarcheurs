@extends('layouts.user')

@section('content')
    @include('partials.alerts', ['title' => 'Logements obsolètes'])
    @include('partials.table-add-del-view')
@endsection

@section('script')
    @include('partials.script-add-del-view')
@endsection