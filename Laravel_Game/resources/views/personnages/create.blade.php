@extends ('layouts.app')

@section('content')
    <div id="wrapper">
        <div class="container" id="page">
            <h1 class="heading has-text-weight-bold is-size-4 text-center mb-5">Créer son personnage</h1>

            <form method="POST" action="{{ route('personnage.store') }}" class="mx-auto w-25 mb-5">
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
                    <select class="form-control" id="classe" name="classe">
                        @foreach($classes as $classe)
                            <option>{{ $classe->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="btn btn-primary btn-block" type="submit">Créer</button>
                    </div>
                </div>
            </form>


            <h2 class="text-center">Statistiques de base</h2>
            <div class="row justify-content-center my-4">
            @foreach($classes as $classe)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h2 class="text-center">{{ $classe->name }}</h2>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center"><i class="fas fa-heart"></i> {{ $classe->hp_max }}</li>
                                <li class="list-group-item text-center"><i class="fas fa-gavel"></i>  {{ $classe->degat_max }}</li>
                                <li class="list-group-item text-center"><i class="fas fa-shield-alt"></i> {{ $classe->defense_max }}</li>
                                <li class="list-group-item text-center"><i class="fas fa-walking"></i> {{ $classe->esquive_max }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>


        </div>
    </div>

@endsection
