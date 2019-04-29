<nav>
    <div class="menuKapsulu">
        <ul>
            <li>
                @foreach($marketler as $market)
                    <a href="{{ route('market',$market->slug) }}" >
                        {{$market->market_adi}}
                    </a>
                @endforeach
            </li>
        </ul>
    </div>
</nav>