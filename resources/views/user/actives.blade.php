@extends('layouts.user')

@section('content')
    @include('partials.alerts', ['title' => 'Logements actifs'])
    @include('partials.table-add-del-view', ['edit' => true])
@endsection

@section('script')
    @include('partials.script-add-del-view')
@endsection