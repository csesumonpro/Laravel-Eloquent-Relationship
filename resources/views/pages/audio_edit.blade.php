@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('audio.update',$audio->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$audio->name}}" placeholder="Aduio Name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control" name="tags[]" id="tags" multiple>
                            @foreach(\App\Model\Tag::all() as $tag)
                                <option @if(in_array($tag->id,$audio->tags->pluck('id')->toArray())) selected @endif value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
