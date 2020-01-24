@extends('layouts.appGame')

@section('content')
    @foreach($classesPerso as $classe)
        @foreach ($items->where('name', $arme) as $item)
            <form method="POST" action="{{ route('personnage.getItem') }}">
                @csrf
                <div class="field pb-3">
                    <div class="control">
                        <input type="hidden" class="form-control input" name="name" id="name" value="{{ $item->name }}">
                    </div>
                    <div class="control">
                        <input type="hidden" class="form-control input" name="pseudo" id="pseudo" value="{{ $personnage->pseudo }}">
                        {!! nl2br("
                        À la suite de ce combat victorieux vous vous dirigez vers le tavernier, que vous retrouvez séquestré, bailloné, ligoté.
                        Vous le détachez et l'aidez à s'asseoir, en attendant qu'il reprenne ses esprits vous allez chercher une cruche d'eau.
                        En arrivant devant lui il vous adresse ces quelques mots:
                        -Merci de votre aide aventurier, sans vous je serais mort à l'heure qu'il est.
                        -Que vous voulez ces brigands?
                        -Sûrement récupérer mes maigres profits des 3 derniers mois que je n'ai pas encore pu mettre en sécurité.
                        -Il ne devrait plus vous importuner maintenant.
                        -Pour vous remercier, vous pouvez passer la nuit dans ma taverne. Le dernier aventurier qui est passé ici n'avait pas de quoi payer sa nuit, il m'a donc laisser son arme, prenez la, elle vous sera plus utile qu'à moi.

                        Après cette nuit à la taverne, vous remerciez le gérant de cette dernière et vous partez en direction de votre prochaine aventure.

                       ") !!}
                        @if (empty($itemsInventaire))
                            <button class="btn btn-outline-success" type="submit">
                                <i class="fas fa-gift fa-2x mr-2 my-2"></i>
                                Prendre {{ $item->name }}
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        @endforeach
    @endforeach
    @section('buttons')
            <a class="btn btn btn-outline-primary w-25 my-4 mx-auto" href="{{ route('passer', ['user'=> auth()->user()->id]) }}"><i class="fas fa-book fa-2x mr-2 my-2"></i>Fin du tutoriel.</a>
    @endsection
@endsection
