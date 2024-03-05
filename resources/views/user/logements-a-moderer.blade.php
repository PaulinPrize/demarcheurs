@extends('layouts.user')

@section('content')

    @include('partials.message', ['url' => route('user.refuse')])
    @include('partials.alerts', ['title' => 'Logements à modérer'])

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adModeration as $logement)
                    <tr id="{{ $logement->id }}">
                        <td>{{ $logement->title }}</td>
                        <td class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('logements.show', $logement->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir le logement">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-success btn-sm" href="{{ route('user.approve', $logement->id) }}" role="button" data-toggle="tooltip" title="Approuver le logement">
                                <i class="fas fa-thumbs-up"></i>
                            </a>
                            <i class="fas fa-spinner fa-pulse fa-lg" style="display: none"></i>
                            <a class="btn btn-danger btn-sm" href="#" role="button" data-id="{{ $logement->id }}" data-toggle="tooltip" title="Refuser le logement">
                                <i class="fas fa-thumbs-down"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex">
        <div class="mx-auto">
            {{ $adModeration->links() }}
        </div>
    </div>
@endsection

@section('script')
    @include('partials.script')
@endsection