@extends('layouts.appGame')

@section('content')

    <h1 class="text-center">{{ $personnage->pseudo }} arrive page 2</h1>
    @foreach ($monstres->where('name', 'Dragon') as $monstre)
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
            <div class="field is-grouped">
                <div class="control">
                    <p>Vous tombez sur un ennemi : {{ $monstre->name }}</p>
                    <p>
                        <span class="alert-danger lead">Vous décidez :</span>
                        <button class="btn btn-link" type="submit">Lancer le combat</button>
                    </p>

            </div>
        </div>
    </form>
    @endforeach

    <p>
        <span class="alert-danger lead">Aller vers :</span>
        <a href="{{ route('tuto.page1') }}" class="btn btn btn-outline-info w-25 my-4 mx-auto">Page 1</a>
    </p>


@endsection
