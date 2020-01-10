@extends ('layouts.appGame')

@section('content')
    <!-- Import  de script pour le side menu -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <div class="container text-justify lead">
        <h1 class="text-center mb-5">Présentation gameplay du site dont vous êtes le héros</h1>
        <div>
            Dans chacune des aventures que vous parcourerez, tous les choix que vous ferez auront une influence sur la suite de votre histoire et le déroulement des événements.
            Vous serez amené à rencontrer différentes icônes:
                <ul>
                    <li>
                        <img src="{{ asset("storage/images/book.png") }}"> Cette icône représente un changement de page.
                        <img src="{{ asset("storage/images/sword.png") }}"> Cette icône représente la possibilité de récupérer une arme.
                        <img src="{{ asset("storage/images/backpack.png") }}"> Cette icône représente la possibilité de récupérer un équipement.
                    </li>
                </ul>
            Il vous faudra cliquer dessus afin d'intéragir avec.
            Concernant les combats, ils se feront automatiquement, en se basant sur vos stats et celles de votre ennemi et se dérouleront en tour par tour.
        </div>
    <br>
    </div>
    <a href="/tuto/introduction" class="btn btn-primary btn-block my-4 mx-auto">Commencer votre aventure</a>
@endsection
