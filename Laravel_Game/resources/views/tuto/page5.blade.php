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
                    {!! nl2br("
                    À la suite de ce combat victorieux vous vous dirigez vers le tavernier, que vous retrouvez séquestré, bailloné, ligoté.
                    Vous le détachez et l'aidez à s'asseoir, en attendant qu'il reprenne ses esprits vous allez cherchez une cruche d'eau.
                    En arrivant devant lui il vous adresse ces quelques mots:
                    -Merci de votre aide aventurier, sans vous je serais mort à l'heure qu'il est. 
                    -Que vous voulez ces brigands?
                    -Sûrement récupérer mes maigres profits des 3 derniers mois que je n'ai pas encore pu mettre en sécurité.
                    -Il ne devrait plus vous importuner maintenant.
                    -Pour vous remercier, vous pouvez passer la nuit dans ma taverne. Le dernier aventurier qui est passé ici n'avait pas de quoi payer ça nuit, il m'a donc laisser son ARME, prenez la, elle vous sera plus utile qu'à moi.

                    Après cette nuit à la taverne, vous remerciez le géreant de cette dernière et vous partez en direction de votre prochaine aventure.

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
