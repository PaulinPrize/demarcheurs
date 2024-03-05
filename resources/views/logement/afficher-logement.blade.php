@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="massageOk" class="alert alert-success" role="alert" style="display: none">
            Votre message a été pris en compte et sera envoyé rapidement
        </div>

        @include('partials.message', ['url' => route('message')])

        <div class="card bg-light">
            <h5 class="card-header">{{ $logement->title }}</h5>
            @if($photos->isNotEmpty())
                @if($photos->count() > 1)
                    <div id="ctrl" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($photos as $photo)
                                <li data-target="#ctrl" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($photos as $photo)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img class="d-block w-100" src="{{ asset('public/images/' . $photo->filename) }}" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#ctrl" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#ctrl" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>
                @else
                    <img class="card-img-top" src="{{ asset('public/images/' . $logement->photos->first()->filename) }}">
                @endif
            @endif
            <div class="card-body">
                <hr>
                <p><u>Description :</u></p>
                <p class="card-text">{{ $logement->texte }}</p>
                <hr>
                <p class="card-text"><u>Catégorie</u> : {{ $logement->category->name }}</p>
                <p class="card-text">
                    <u>Région</u> : {{ $logement->region->name }} <br>
                    <u>Publication</u> : {{ $logement->created_at->calendar() }}
                </p>
                <hr>
                <p class="card-text">
                    <u>Prix</u> : {{ $logement->prix }} F CFA<br>
                    <u>Commission</u> : {{ $logement->commission }} F CFA<br>
                    <u>Frais de visite</u> : {{ $logement->frais_de_visite }} F CFA<br>
                </p>
                <hr>
                <p class="card-text"><u>Pseudo</u> : {{ $logement->pseudo }}</p>
                <hr>
                <button id="openModal" type="button" class="btn btn-warning" style="color:white;">Envoyer un message</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(() => {
            const toggleButtons = () => {
                $('#icon').toggle();
                $('#buttons').toggle();
            }

            $('#openModal').click(() => {
                $('#messageModal').modal();
            });

            $('#messageForm').submit((e) => {
                let that = e.currentTarget;
                e.preventDefault();
                $('#message').removeClass('is-invalid');
                $('.invalid-feedback').html('');
                toggleButtons();
                $.ajax({
                    method: $(that).attr('method'),
                    url: $(that).attr('action'),
                    data: $(that).serialize()
                })
                .done((data) => {
                    toggleButtons();
                    $('#messageModal').modal('hide');
                    $('#massageOk').text(data.info).show();
                })
                .fail((data) => {
                    toggleButtons();
                    $.each(data.responseJSON.errors, function (i, error) {
                        $(document)
                            .find('[name="' + i + '"]')
                            .addClass('is-invalid')
                            .next()
                            .append(error[0]);
                    });
                });
            });
        })
    </script>
@endsection