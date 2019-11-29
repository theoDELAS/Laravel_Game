@extends('tuto.appTuto')

@section('content')

    <h1 class="text-center">{{ $personnage->pseudo }} arrive page 2</h1>

    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at commodi consequuntur dolor eaque explicabo, facere illum laudantium, nulla officia quas quasi qui quibusdam quidem rerum saepe sapiente veritatis vitae!</span><span>Fugiat molestias mollitia perferendis! Atque aut dicta dolorem eaque ex, id iste maiores omnis perferendis porro. Aliquid, atque distinctio dolorem dolorum, illum laboriosam molestiae nam nulla numquam quae quibusdam reprehenderit.</span><span>Accusamus debitis dolore eos, eum facere tenetur totam! Consequuntur cumque enim excepturi in inventore, ipsa ipsam itaque maxime minus molestias nesciunt nihil nobis provident quibusdam temporibus tenetur veritatis voluptate voluptatibus!</span><span>Accusamus accusantium ad deserunt ducimus fuga id illum laborum perferendis quod tempora? Deserunt ex fugit nostrum pariatur placeat quos sint sit, tempore! Laudantium libero nesciunt totam! Est eum maxime voluptates.</span><span>A ab dignissimos dolorem facere fuga iste iure modi molestias nam, necessitatibus non quaerat quidem quisquam sit totam ut vel! Consequatur explicabo in inventore, laudantium nostrum quidem quisquam suscipit temporibus.</span><span>Atque commodi corporis dicta distinctio dolor enim eos eum expedita fugiat nam suscipit, tempora, vero voluptate? Dolor, illo ipsa. A accusamus commodi ea, eos maxime neque perferendis quam sapiente. Autem.</span><span>Commodi doloremque magni molestiae necessitatibus nihil, praesentium quae ratione voluptate. Ad asperiores corporis, delectus dolores et explicabo incidunt iste, provident, quod repellat repellendus voluptas voluptatem. Corporis mollitia nostrum officiis repellat.</span><span>At dolore eos ex excepturi facilis iste nulla officia sit? Commodi, dolore dolorem ea est eum libero nesciunt obcaecati omnis repudiandae sunt! Accusamus deserunt distinctio error ipsam non rem sint?</span><span>Accusamus, ad aliquam aut delectus doloribus error excepturi facilis laudantium maiores molestias neque obcaecati optio quia reprehenderit tempore velit, voluptate. At cum dignissimos dolores id libero neque quam rem sequi?</span><span>Cupiditate illo labore minima, mollitia odio porro quaerat quisquam sapiente? Ad alias architecto dolor dolorem doloribus eligendi magnam nam natus officiis, temporibus ullam voluptas voluptatibus. Ex officia quos ratione vero!</span></p>

    <p>
        <span class="alert-danger lead">Vous décidez :</span>
        <a href="{{ route('tuto.page2') }}" class="btn btn-outline-dark w-25 my-4 mx-auto">Choix 1</a>
        <a href="{{ route('tuto.page3') }}" class="btn btn-outline-dark w-25 my-4 mx-auto">Choix 2</a>
    </p>


@endsection
