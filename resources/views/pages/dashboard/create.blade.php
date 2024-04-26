@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Page</h1>
                <form action="{{ route('pages.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Create Page</button>
                </form>
            </div>
        </div>
    </div>
@endsection
