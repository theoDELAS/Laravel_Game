@extends('layouts.appGame')

@section('content')
    <div class="control">
        {!! nl2br("
       Vous entrez furtivement dans la taverne, les deux homes ne vous ont pas remarqué, ils sont trop occupés à ramasser leur butin.
       Vous entendez ce que vous pensez être le patron de la taverne bailloné et ligoté derrière le comptoir.
       Un des hommes tire un des cadavres jonchant le sol en reculant vers vous.
       Vous vous saisissez de votre dague et vous le poignardez.
       L'homme meurt sur le coup, sans avoir pu se défendre.
       Le bruit du cadavre tombant sur le sol alerta son camarade.
       L'homme se retourne et s'écrie:
       - Viens ici que je te bute enculé !
       ") !!}
    </div>
    @foreach ($monstres->where('name', 'Soldat') as $monstre)
        <form method="POST" action="{{ route('personnage.lancerCombat') }}">
            @csrf
            <div class="field pb-3">
                <div class="control">
                    <input type="hidden" class="form-control input" name="name" id="name" value="{{ $monstre->name }}">
                </div>
                <div class="control">
                    <input type="hidden" class="form-control input" name="pseudo" id="pseudo" value="{{ $personnage->pseudo }}">
                </div>
            </div>
            @if (!Session::has('success'))
                <div class="field is-grouped">
                    <div class="control">
                        <p class="text-center">
                            <button class="btn btn-outline-danger" type="submit">
                                <i class="fas fa-gavel fa-2x mr-2 my-2"></i>
                                Lancer le combat
                            </button>
                        </p>

                    </div>
                </div>
            @endif
        </form>
    @endforeach
    @section('buttons')
        @if (Session::has('success'))
            <a class="btn btn btn-outline-primary w-25 my-4 mx-auto" href="{{ route('tuto.fin') }}"><i class="fas fa-book fa-2x mr-2 my-2"></i>Allez libérer le tavernier.</a>
        @endif
    @endsection
@endsection
