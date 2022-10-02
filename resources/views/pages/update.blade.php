@extends('layouts.base')

@section('title')
    NetBook | Update
@endsection

@section('main')
    <div class="container">
        <div class="card m-4">
            <div class="card-header"><h3>Update Note</h3></div>
            <div class="card-body">
                <form action="{{route('update',$article[0]->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    <div class="mb-3">
                        <label class="form-label">Article</label>
                        <input type="text" name="article" class="form-control" value="{{$article[0]->article}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Source</label>
                        <input type="text" name="source" class="form-control"  value="{{$article[0]->source}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Textarea</label>
                        <textarea name="description" class="form-control" cols="20" rows="5" required>{{$article[0]->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
             </div>
        </div>
    </div>
@endsection