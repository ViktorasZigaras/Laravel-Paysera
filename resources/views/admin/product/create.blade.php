@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>
                <div class="card-body">
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            <small class="form-text text-muted">Product title</small>
                        </div>

                        <hr>

                        <div id="product-image-inputs-area">
                            <input type="file" name="image[]">
                        </div>

                        <hr><br>

                        <button id="add-product-image" type="button">Add Image</button>
                        
                        <hr><br>

                        @csrf
                        <button type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection