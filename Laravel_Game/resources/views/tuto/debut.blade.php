@extends('layouts.appGame')

@section('content')
    <div>
        {!! nl2br("
            Après plusieurs jours de voyage, vous apercevez la première taverne depuis votre départ. Elle ressemble plus à une cabane abandonnée et mal fréquentée, mais honnêtement ça sera toujours mieux que les nuits que vous avez passées dehors.
            Vous ne vous doutiez pas que votre voyage serait aussi rude, vos ressources sont épuisées et votre nécessaire de campement en piteux état.
            De la lumière vous parvient de la taverne. En vous approchant, vous distinguez quelques barriques ainsi qu'un abri pour le bois de la cheminée.
            L'une des vitres, cassée, vous permet d'entendre ce que vous pensez être les propriétaires des deux chevaux attachés à la barrière.
            Les nombreuses sacoches encore arnachées aux chevaux vous alertent, qui laisserait ses affaires sur son cheval alors qu'il est dans une taverne ?
            A quelques pas de la taverne, les voix se font plus distinctes :
            - Tu penses qu'on aura la place sur nos chevaux ?
            - On peut toujours faire plusieurs trajets, personne ne voudra mettre les pieds dans cette taverne perdue au milieu de nul part.
            - D'accord, on le laisse en vie ?
            - On verra, je ne pense pas qu'il le sera à notre retour.
            Suite à cette discussion que vous avez surprise, que décidez vous ?
        ") !!}
    </div>
    @section('buttons')
        <a class="btn btn btn-outline-primary" href="{{ route('tuto.combatChevaux') }}"><i class="fas fa-book fa-2x mr-2 my-2"></i>Libérer les chevaux pour les attirer à l'extérieur.</a>
        <a class="btn btn-outline-primary" href="{{ route('tuto.combatSneaky') }}"><i class="fas fa-book fa-2x mr-2 my-2"></i>Entrer dans la taverne subtilement</a>
    @endsection
@endsection
