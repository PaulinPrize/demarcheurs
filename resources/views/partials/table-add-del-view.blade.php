<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Limite</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logements as $logement)
                <tr id="{{ $logement->id }}">
                    <td>{{ $logement->title }}</td>
                    <td class="date-id">{{ date_create($logement->limit)->format('d-m-Y') }}</td>
                    <td class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('logements.show', $logement->id) }}" target="_blank" role="button" data-toggle="tooltip" title="Voir le logement"><i class="fas fa-eye"></i></a>
                        @isset($edit)
                            <a class="btn btn-warning btn-sm" href="{{ route('logements.edit', $logement->id) }}" role="button" data-toggle="tooltip" title="Modifier le logement"><i class="fas fa-edit"></i></a>
                        @endisset
                        <i class="fas fa-spinner fa-pulse fa-lg" style="display: none"></i>
                        @empty($noAdd)
                            <a class="btn btn-success btn-sm" href="{{ route('user.addweek', $logement->id) }}" role="button" data-id="{{ $logement->id }}" data-toggle="tooltip" title="Ajouter une semaine"><i class="fas fa-arrow-alt-circle-up"></i></a>
                        @endisset
                        <a class="btn btn-danger btn-sm" href="{{ route('user.destroy', $logement->id) }}" role="button" data-id="{{ $logement->id }}" data-toggle="tooltip" title="Supprimer le logement"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex">
    <div class="mx-auto">
        {{ $logements->links() }}
    </div>
</div>