@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body">
                    @foreach ($products as $product)
                        <a href="{{route('product.edit',[$product])}}">{{$product->title}}</a>
                        <form method="POST" action="{{route('product.destroy', [$product])}}">
                            @csrf
                            <button type="submit">DELETE</button>
                        </form>
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
@endsection