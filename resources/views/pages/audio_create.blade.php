@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('audio.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Aduio Name" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control" name="tags[]" id="tags" multiple>
                            @foreach(\App\Model\Tag::all() as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
