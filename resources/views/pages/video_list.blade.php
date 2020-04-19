@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary float-right" href="{{route('video.create')}}">Add New</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$video->name}}</td>
                            <td>
                                @foreach($video->comments as $comment)
                                    <p>{{$comment->body}} </p>
                                    <hr>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{route('video.destroy',$video->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('video.edit',$video->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('createComment',$video->id)}}" class="btn btn-warning">Comment</a>
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
