@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('product.update',$product->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$product->name}}" placeholder="Product Name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" name="categories[]" id="categories" multiple>
                            @foreach($categories as $category)
                                <option @if(in_array($category->id,$product->categories->pluck('id')->toArray())) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
