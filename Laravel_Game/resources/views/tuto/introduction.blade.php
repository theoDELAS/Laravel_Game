@extends ('layouts.appGame')

@section('content')


    <div class="container text-justify lead">
        <h1 class="text-center mb-5">Bienvenue dans NakariK</h1>
        <div>
            Jadis, quatre peuples se partageaient les terres du continent de NakariK. Chaque civilisation prospérait grâce à ce que leurs terres respectives avait à leur offrir. Elles se procuraient le reste via les autres nations par la seule route marchande traversant le continent.<br>
            Partant de chaque cité, et convergeant en Gil' Ead, cette route était le seul moyen sûr de traverser le continent. Pour cause, entre les terres d'Ikaru, la forêt de Falyar et Nestirohkha se trouvait le lac Rukizur. Bordé de plage d'un côté et de mangrove de l'autre, ce lac était connu pour ses légendes comme étant infranchissable. <br>
            À l'opposé de la forêt de Falyar, se trouve le tombeau des mille lames, une grande étendue de lames de roches, formée par des millénaires de tempêtes creusant la roche et formant des lames de plusieurs dizaines de metre de hauts. Son nom vient d'une lointaine guerre entre le peuple de Falyar et le peuple de Costpol ayant envoyé chacun cinq cents soldats qui ne revinrent jamais. <br>

        </div>
        <br>
        <div>
            Afin de survivre dans ce monde dévasté, il vous faudra vous former au combat. Pour cela, 3 choix s'offrent à vous:
        </div>
        <br>
        @foreach($classes as $classe)
        <div class="mb-3">
            - <span class="font-weight-bold">{{ $classe->name }}</span> : {{ $classe->histoire }}
        </div>
        @endforeach
    </div>
        <a href="{{ route('personnage.create') }}" class="btn btn-primary btn-block my-4 mx-auto">Choisir un personnage</a>
@endsection
