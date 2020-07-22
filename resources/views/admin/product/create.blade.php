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

                        <input type="file" name="image[]">

                        <br>

                        <input type="file" name="image[]">

                        <br>

                        <!-- <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="surname" value="{{old('surname')}}" class="form-control">
                            <small class="form-text text-muted">Author Surname</small>
                        </div> -->

                        @csrf
                        <button type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection