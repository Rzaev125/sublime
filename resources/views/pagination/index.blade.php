<div class="product_pagination">
    <ul>
        @foreach ($elements as $element)
            @if(is_string($element))
                <li class="dissabled"><span>{{ $element }}</span></li>
            @endif
            @if(is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">{{$page}}</li>
                    @else
                        <li><a href="{{$url}}">{{ $page }}</a></li>
                    @endif  
                @endforeach
            @endif
        @endforeach
    </ul>
</div>