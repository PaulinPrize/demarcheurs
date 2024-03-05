<div class="row">
    @foreach($logements as $logement)
    <div class="col-lg-6">
        <a href="{{ route('logements.show', $logement->id) }}" class="blockAd">
            <div class="card d-flex flex-row">
                <div class="card-header">
                    @if($logement->photos->isNotEmpty())  
                        <img class="rounded" src="{{ asset('public/thumbs/' . $logement->photos->first()->filename) }}" alt="">
                    @else
                        <img src="{{ asset('public/thumbs/question.jpg') }}" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $logement->title }}</h4>
                    <p class="card-text">{{ $logement->category->name }}</p>
                    <p class="card-text">
                        testo<br>
                        {{ $logement->created_at->calendar() }}
                    </p>
                </div>
            </div>
        </a>
        <br>  
    </div>  
    @endforeach
</div>
<div class="d-flex">
    <div class="mx-auto">
        {{ $logements->links() }}
    </div>
</div>