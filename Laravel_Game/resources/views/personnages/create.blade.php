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
            <section class="custom">
                <div class="container">
                    <div class="row justify-content-center my-4">
                        @foreach($classes as $classe)
                            <div class="flipper col-md-4">
                                <div class="card mb-3">
                                    <div class="front">
                                        <div class="card-header">
                                            <h2 class="text-center">{{ $classe->name }}</h2>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item text-center"><i class="fas fa-heart fa-lg pr-3" style="color: red"></i> {{ $classe->hp }}</li>
                                                <li class="list-group-item text-center"><i class="fas fa-gavel fa-lg pr-3"></i>  {{ $classe->degats }}</li>
                                                <li class="list-group-item text-center"><i class="fas fa-shield-alt fa-lg pr-3" style="color: steelblue"></i> {{ $classe->defense }}</li>
                                                <li class="list-group-item text-center"><i class="fas fa-walking fa-lg pr-3" style="color: darkgreen"></i> {{ $classe->esquive }}</li>
                                            </ul>
                                            <button class="btn btn-info bottom text-light" type="submit"><i class="fas fa-redo-alt"></i> Histoire</button>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="card-header">
                                            <h2>{{ $classe->name }}</h2>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-justify">{{ $classe->histoire }}</p>
                                            <button class="btn btn-info bottom mx-auto text-light" type="submit"><i class="fas fa-redo-alt"></i> Statistiques</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>


        </div>
    </div>

@endsection
