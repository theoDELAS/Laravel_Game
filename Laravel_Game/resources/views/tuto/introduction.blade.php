@extends ('tuto.appTuto')


<body>
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
            Afin de survivre dans ce monde dévasté, il vous faudra vous former au combat. Pour cela, 3 choix s'offrent à vous :
            <ul>
                <li>
                    <span class="font-weight-bold">Le guerrier</span> :
                    Vous avez été élevé dans la caserne du fort Hekiparthos, creusé dans le mont Costpol, surplombant les terres de NakariK.
                    Votre éducation vous a permis de perfectionné votre maniement des armes ainsi que d'obtenir un physique à en faire pâlir les dieux.
                    Pour votre 21ème anniversaire, votre maître d'armes Sotark, vous a donné comme quête de parcourir le monde afin de perfectionner votre art.
                </li>
                <li>
                    <span class="font-weight-bold">Le mage</span> :
                    Vous êtes nés un soir d'hiver sous les magnifiques aurores boréales de Nakarik, signe d'une profonde aptitude pour la magie.
                    Des érudits de l'académie Doaxir sont donc venus vous chercher pour vous formez à ces arcanes et parfaire votre don.
                    Vos années passées dans le royaume Ikaru, à flan de falaise, n'ont fait qu'accroître vos envies de liberté et de voyage.
                </li>
                <li>
                    <span class="font-weight-bold">L'archer</span> :
                    Vous avez grandi dans la magnifique forêt de Falyar, remplies d'arbres géants habités par la tribu des Taëlyan.
                    Votre mode de vie se basant sur la chasse, vous êtes rapidement devenu le meilleur archer de votre tribu.
                    Votre chef, Ulore, vous a confié l'étude de la désolation dans les terres de Gil' Ead.
                </li>
            </ul>
        </div>


    </div>
        <a href="{{ route('personnage.create') }}" class="btn btn-primary btn-block my-4 mx-auto">Choisir un personnage</a>
@stop
