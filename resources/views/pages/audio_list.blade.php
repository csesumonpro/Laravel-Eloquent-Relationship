@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary float-right" href="{{route('audio.create')}}">Add New</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($audios as $audio)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$audio->name}}</td>
                            <td>
                                @foreach($audio->tags as $tag)
                                    <span>{{$tag->name}}</span>
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                <form action="{{route('audio.destroy',$audio->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('audio.edit',$audio->id)}}" class="btn btn-warning">Edit</a>
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
