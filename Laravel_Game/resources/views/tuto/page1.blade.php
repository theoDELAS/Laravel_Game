@extends('tuto.appTuto')

@section('content')
    @error('success')
        <p class="alert alert-success">{{ $message }}</p>
    @enderror
    <div class="container lead">
        <h1 class="text-center">{{ $personnage->pseudo }} arrive Page 1</h1>
        @foreach ($items->where('nom', 'Epée') as $item)
        <form method="POST" action="{{ route('personnage.getItem') }}">
            @csrf
            <div class="field pb-3">
                <div class="control">
                    <input type="hidden" class="form-control input" name="nom" id="nom" value="{{ $item->nom }}">
                </div>
                <div class="control">
                    <input type="hidden" class="form-control input" name="pseudo" id="pseudo" value="{{ $personnage->pseudo }}">
                </div>

            </div>
            <div class="field is-grouped">
                <div class="control">
                    <p>
                        Vous trouvé une arme ! Vous décider de l'équiper.
                        <button class="btn btn-link" type="submit">Prendre {{ $item->nom }}</button>
                    </p>
                </div>
            </div>
        </form>
        @endforeach

    </div>

@endsection
