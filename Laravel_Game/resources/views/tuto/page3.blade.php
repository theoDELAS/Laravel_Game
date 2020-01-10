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
                    {!! nl2br("VERSION CHEVAUX
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
