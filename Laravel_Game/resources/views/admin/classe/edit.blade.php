@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h3 text-center">Modifier la classe {{ $classe->name }}</div>

                    <div class="card-body">
                        <form action="{{ route('admin.classe.update', $classe) }}" method="POST">

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $classe->name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hp_base" class="col-md-2 col-form-label text-md-right">Vie de base</label>
                                <div class="col-md-6">
                                    <input id="hp_base" type="number" class="form-control" name="hp_base" value="{{ $classe->hp_base }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hp_max" class="col-md-2 col-form-label text-md-right">Vie max</label>
                                <div class="col-md-6">
                                    <input id="hp_max" type="number" class="form-control" name="hp_max" value="{{ $classe->hp_max }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hp_current" class="col-md-2 col-form-label text-md-right">Vie actuelle</label>
                                <div class="col-md-6">
                                    <input id="hp_current" type="number" class="form-control" name="hp_current" value="{{ $classe->hp_current }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degat_base" class="col-md-2 col-form-label text-md-right">Dégats de base</label>
                                <div class="col-md-6">
                                    <input id="degat_base" type="number" class="form-control" name="degat_base" value="{{ $classe->degat_base }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degat_max" class="col-md-2 col-form-label text-md-right">Dégats max</label>
                                <div class="col-md-6">
                                    <input id="degat_max" type="number" class="form-control" name="degat_max" value="{{ $classe->degat_max }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="degat_current" class="col-md-2 col-form-label text-md-right">Dégats actuels</label>
                                <div class="col-md-6">
                                    <input id="degat_current" type="number" class="form-control" name="degat_current" value="{{ $classe->degat_current }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="defense_base" class="col-md-2 col-form-label text-md-right">Défense de base</label>
                                <div class="col-md-6">
                                    <input id="defense_base" type="number" class="form-control" name="defense_base" value="{{ $classe->defense_base }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="defense_max" class="col-md-2 col-form-label text-md-right">Défense max</label>
                                <div class="col-md-6">
                                    <input id="defense_max" type="number" class="form-control" name="defense_max" value="{{ $classe->defense_max }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="defense_current" class="col-md-2 col-form-label text-md-right">Défense atuelle</label>
                                <div class="col-md-6">
                                    <input id="defense_current" type="number" class="form-control" name="defense_current" value="{{ $classe->defense_current }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="esquive_base" class="col-md-2 col-form-label text-md-right">Esquive de base</label>
                                <div class="col-md-6">
                                    <input id="esquive_base" type="number" class="form-control" name="esquive_base" value="{{ $classe->esquive_base }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="esquive_max" class="col-md-2 col-form-label text-md-right">Esquive max</label>
                                <div class="col-md-6">
                                    <input id="esquive_max" type="number" class="form-control" name="esquive_max" value="{{ $classe->esquive_max }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="esquive_current" class="col-md-2 col-form-label text-md-right">Esquive actuelle</label>
                                <div class="col-md-6">
                                    <input id="esquive_current" type="number" class="form-control" name="esquive_current" value="{{ $classe->esquive_current }}" required autofocus>
                                </div>
                            </div>
                            @csrf
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-primary">
                                Modifier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
