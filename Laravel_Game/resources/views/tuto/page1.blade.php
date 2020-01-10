@extends('layouts.appGame')

@section('content')
    @error('success')
        <p class="alert alert-success">{{ $message }}</p>
    @enderror
    <div class="container lead">
        <h1 class="text-center">{{ $personnage->pseudo }} découvre la taverne.</h1>
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
                    <p>
                        Après plusieurs jours de voyage, vous apercevez la première taverne depuis votre départ. Elle ressemble plus à une cabane abandonnée et mal fréquentée,
                        mais honnêtement ça sera toujours mieux que les nuits que vous avez passées dehors.
                        Vous ne vous doutiez pas que votre voyage serait aussi rude, vos ressources sont épuisées et votre nécessaire de campement en piteux état.
                        De la lumière vous parvient de la taverne. En vous approchant, vous distinguez quelques barriques ainsi qu'un abri pour le bois de la cheminée.
                        L'une des vitres, cassée, vous permet d'entendre ce que vous pensez être les propriétaires des deux chevaux attachés à la barrière.
                        Les nombreuses sacoches encore arnachées aux chevaux vous alertent, qui laisserait ses affaires sur son cheval alors qu'il est dans une taverne ?
                        A quelques pas de la taverne, les voix se font plus distinctes :
                        - Tu penses qu'on aura la place sur nos chevaux ?
                        - On peut toujours faire plusieurs trajets, personne ne voudra mettre les pieds dans cette taverne perdue au milieu de nul part.
                        - D'accord, on le laisse en vie ?
                        - On verra, je ne pense pas qu'il le sera à notre retour.
                        Suite à cette discussion que vous avez surpise, que décidez vous ?



                    </p>
                </div>
            </div>
        </form>
        @endforeach
        <div>
            <p>
                <a class="btn btn btn-outline-info w-25 my-4 mx-auto" href="{{ route('tuto.page2') }}">Libérer les chevaux pour les attirer à l'extérieur.</a>
                <a class="btn btn-outline-info" href="{{ route('tuto.page3') }}">Entrer dans la taverne subtilement</a>
            </p>
        </div>
    </div>
@endsection
