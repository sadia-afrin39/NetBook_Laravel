@extends('layouts.base')

@section('title')
    NetBook | Create
@endsection

@section('main')
    <div class="container">
        <div class="card m-4">
            <div class="card-header"><h3>Create Note</h3></div>
            <div class="card-body">
                <form action="{{route('store')}}" method="post">
                    @csrf
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
                        <input type="text" name="article" class="form-control" placeholder="Article should be unique" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Source</label>
                        <input type="text" name="source" class="form-control" placeholder="Source Link" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Textarea</label>
                        <textarea name="description" class="form-control" cols="20" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
             </div>
        </div>
    </div>
@endsection