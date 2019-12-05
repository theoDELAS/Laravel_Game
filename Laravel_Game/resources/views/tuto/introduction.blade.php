@extends ('tuto.appTuto')

@section('content')
    <!-- Import  de script pour le side menu -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


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
