<span class="count">{{$count}}</span>
<span class="total">{{$total}}</span>
<span class="currency">EUR</span>
<div class="mini-cart-list">

<ul>
    @foreach ($items as $item)
        <li class="nav-item dropdown">
            {{$item->title}} x {{$cart[$item->id]['count']}} ( {{$cart[$item->id]['price']}} ) EUR
        </li>
        <form action="{{route('front.remove')}}" method="POST">
            <input type="hidden" name="product_id" value="{{$item->id}}">
            @csrf
            <button type="submit">-</button>
        </form>
    @endforeach
</ul>

<!-- <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Products</a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('product.index') }}">Product List</a>
        <a class="dropdown-item" href="{{ route('product.create') }}">New Product</a>
    </div>
</li> -->                                   