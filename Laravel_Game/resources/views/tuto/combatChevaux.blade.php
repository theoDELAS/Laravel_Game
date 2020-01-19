@extends('layouts.appGame')

@section('content')
    <div>
        {!! nl2br("
       Vous vous approchez minutieusement des chevaux et détachez leur lanière les reliants à leur point d'ancrage, suite à quoi vous les faites fuir
       avec une tape sur la croupe.
       Vous partez vous cacher derrière les barriques en attendant que les hommes sortent.
       Vous les entendez se posez des questions concernant les bruits dehors.
       - Qu'est ce qui se passe?
       - Attend là, je vais aller voir.
       Lorsque l'homme sors il s'écria que les chevaux ne sont plus là.
       Vous vous précipitez sur lui dans son dos et tranchez sa gorge.
       Les bruits d'étouffement de son camarade ayant interpellé l'homme restant, il accoura dehors et tomba nez à nez avec le cadavre giseant de son compère avec vous derrière.
       - C'est toi qui viens de faire ça petit merdeux ? Vocifera l'homme.
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
