@extends('layouts.appGame')

@section('content')
    @error('success')
        <p class="alert alert-success">{{ $message }}</p>
    @enderror
    <div class="container lead">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">{{ $personnage->pseudo }}</small></button>

        <div class="vertical-nav bg-white" id="sidebar">
            <div class="card mt-5 mb-3">
                <div class="card-header">
                    <h2 class="text-center">{{ $personnage->pseudo }}</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center"><i class="fas fa-heart mr-3"></i> {{ $personnage->hp }}/{{ $personnage->hp }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-gavel mr-3"></i>  {{ $personnage->degats }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-shield-alt mr-3"></i> {{ $personnage->defense }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-walking mr-3"></i> {{ $personnage->esquive }}</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="card mt-5 mb-3">
                    <div class="card-header">
                        <h2 class="text-center">Inventaire</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($itemsInventaire as $item)
                                <li class="list-group-item text-center">{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End vertical navbar -->










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
                        Après plusieurs jours de voyage, vous apercevez la première taverne depuis votre départ. Elle ressemble plus à une cabane abandonée et mal fréquentée, mais honnêtement ça sera toujours mieux que les nuits que vous avez passées dehors.
                        Vous ne vous doutiez pas que votre voyage serait aussi rude, vos ressources sont épuisées et votre nécessaire de campement en piteux état.
                        Voilà maintenant
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
