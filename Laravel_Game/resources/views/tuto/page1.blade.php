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
                    <p>
                        Après plusieurs jours de voyage, vous apercevez la première taverne depuis votre départ. Elle ressemble plus à une cabane abandonnée et mal fréquentée,
                        mais honnêtement ça sera toujours mieux que les nuits que vous avez passées dehors.
                    </p>
                    <p>
                        Vous ne vous doutiez pas que votre voyage serait aussi rude, vos ressources sont épuisées et votre nécessaire de campement en piteux état.
                    </p>
                    <p>
                        De la lumière vous parvient de la taverne. En vous approchant, vous distinguez quelques barriques ainsi qu'un abri pour le bois de la cheminée.
                    </p>
                    <p>
                        L'une des vitres, cassée, vous permet d'entendre ce que vous pensez être les propriétaires des deux chevaux attachés à la barrière.
                    </p>
                    <p>
                        Les nombreuses sacoches encore arnachées aux chevaux vous alertent, qui laisserait ses affaires sur son cheval alors qu'il est dans une taverne ?
                    </p>
                    <p>
                        A quelques pas de la taverne, les voix se font plus distinctes :
                    </p>
                    <p>
                        - Tu penses qu'on aura la place sur nos chevaux ?
                    </p>
                    <p>
                        - On peut toujours faire plusieurs trajets, personne ne voudra mettre les pieds dans cette taverne perdue au milieu de nul part.
                    </p>
                    <p>
                        - D'accord, on le laisse en vie ?
                    </p>
                    <p>
                        - On verra, je ne pense pas qu'il le sera à notre retour.
                    </p>
                    <p>
                        Suite à cette discussion que vous avez surprise, que décidez vous ?
                    </p>
                </div>
            </div>
        </form>
        @endforeach
        <div>
            <p>
            <a class="btn btn btn-outline-info w-25 my-4 mx-auto" href="{{ route('tuto.page2') }}"> <img src="{{ asset("ressources/images/book.png") }}"> Libérer les chevaux pour les attirer à l'extérieur.</a>
            <a class="btn btn-outline-info" href="{{ route('tuto.page2') }}"> <img src="{{ asset("ressources/images/book.png") }}"> Entrer dans la taverne subtilement</a>
            </p>
        </div>
@endsection
