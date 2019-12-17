@extends('layouts.appGame')

@section('content')
    @error('success')
        <p class="alert alert-success">{{ $message }}</p>
    @enderror
    <div class="container lead">
        <h1 class="text-center">{{ $personnage->pseudo }} arrive Page 1</h1>
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
                        Vous trouvez une arme ! Vous décider de l'équiper.
                        <button class="btn btn-link" type="submit">Prendre {{ $item->name }}</button>
                    </p>
                </div>
            </div>
        </form>
        @endforeach
        <div>
            <p>
                Vous décidez de vous diriger vers :
                <a class="btn btn btn-outline-info w-25 my-4 mx-auto" href="{{ route('tuto.page2') }}">Page 2</a>
{{--                <a class="btn btn-outline-info" href="{{ route('tuto.page3') }}">Page 3</a>--}}
            </p>
        </div>
    </div>
@endsection
