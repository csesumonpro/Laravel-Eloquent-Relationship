@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('product.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Product Name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" name="categories[]" id="categories" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
