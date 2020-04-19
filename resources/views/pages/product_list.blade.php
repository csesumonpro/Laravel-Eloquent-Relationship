@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary float-right" href="{{route('product.create')}}">Add New</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$product->name}}</td>
                            <td>
                                @foreach($product->categories as $category)
                                    <span>{{$category->name}}</span>
                                    @if(!$loop->last)
                                        ,
                                        @endif
                                @endforeach
                            </td>
                            <td>
                                <form action="{{route('product.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
