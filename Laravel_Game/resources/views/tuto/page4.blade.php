@extends('layouts.appGame')

@section('content')
    @error('success')
    <p class="alert alert-success">{{ $message }}</p>
    @enderror
    <h1 class="text-center">L'épopée de {{ $personnage->pseudo }}</h1>
    @foreach ($items->where('name', 'Casque') as $item)
        <form method="POST" action="{{ route('personnage.getItem') }}">
            @csrf
            <div class="field pb-3">
                <div class="control">
                    <input type="hidden" class="form-control input" name="name" id="name" value="{{ $item->name }}">
                </div>
                <div class="control">
                    <input type="hidden" class="form-control input" name="pseudo" id="pseudo" value="{{ $personnage->pseudo }}">
                </div>

            </div>
            <div class="field is-grouped">
                <div class="control">
                    {!! nl2br("VERSION SNIKI
                   Vous entrez furtivement dans la taverne, les deux homes ne vous ont pas remarqué, ils sont trop occupés à ramasser leur butin.
                   Vous entendez ce que vous pensez être le patron de la taverne bailloné et ligoté derrière le comptoir.
                   Un des hommes tire un des cadavres jonchant le sol en reculant vers vous.
                   Vous vous saisissez de votre dague et vous le poignardez.
                   L'homme meurt sur le coup, sans avoir pu se défendre.
                   Le bruit du cadavre tombant sur le sol alerta son camarade.
                   L'homme se retourne et s'écrie:
                   - Viens ici que je te bute enculé !

                   COMBAT

                   ") !!}
                </div>
            </div>
        </form>
    @endforeach
    <div>
        <p>
            <a class="btn btn btn-outline-info w-25 my-4 mx-auto" href="{{ route('tuto.page2') }}"> <img src="{{ asset("storage/images/book.png") }}"> Libérer les chevaux pour les attirer à l'extérieur.</a>
            <a class="btn btn-outline-info" href="{{ route('tuto.page2') }}"> <img src="{{ asset("storage/images/book.png") }}"> Entrer dans la taverne subtilement</a>
        </p>
    </div>
@endsection
