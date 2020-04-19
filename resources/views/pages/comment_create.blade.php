@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{$video->name}}</h2>
            <div class="col-md-12">
                <form action="{{route('CommentStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$video->id}}" name="video_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Video Name" name="body" class="form-control" id="name">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
