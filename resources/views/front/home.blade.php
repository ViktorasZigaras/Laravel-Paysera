@extends('front.app')

@section('content')       

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    @foreach ($products as $product)
                        <a href="{{route('product.edit',[$product])}}">{{$product->title}}</a>
                        <div class="form">
                            <div class="form-group">
                                <label>Count</label>
                                <input type="hidden" name="route" value="{{ route('front.addJS') }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="text" name="count" value="0" class="form-control" style="width: 70px">
                            </div>
                            @csrf
                            <button class="add-button" type="button">ADD TO CART</button>
                        </div>
                        <br>
                        @foreach ($product->productImages as $image)
                            <img src="{{asset('images/products/' . $image->name)}}" alt="{{$image->alt}}" style="width: 250px; height: 200px;">
                        @endforeach
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('buy') }}" method="post">
    NAME: <input type="text" name="name" value="">
    EMAIL: <input type="text" name="email" value="">
    PHONE: <input type="text" name="phone" value="">
    @csrf
    <button type="submit">BUY</button>
</form>

@endsection