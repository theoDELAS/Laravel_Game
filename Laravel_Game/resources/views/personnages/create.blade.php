@extends ('layouts.app')

@section('content')
    <div id="wrapper">
        <div class="container" id="page">
            <h1 class="heading has-text-weight-bold is-size-4">Créer son personnage</h1>

            <form method="POST" action="/personnages" class="w-25">
                @csrf
                <div class="field pb-3">
                    <div class="control">
                        <input type="text" class="form-control input @error('pseudo') alert-danger @enderror" name="pseudo" id="pseudo" value="{{ old('pseudo') }}" placeholder="Pseudo">

                        @error('pseudo')
                            <p class="help is-danger text-danger">{{ $errors->first('pseudo') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <select class="form-control" id="classe" name="classe">!
                        <option>Guerrier</option>
                        <option>Archer</option>
                        <option>Mage</option>
                    </select>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="btn btn-primary" type="submit">Créer</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
