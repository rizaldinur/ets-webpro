@extends('template')
@section('title', 'Add Category')
@section('content')
    <div class="container  my-5">
        <h1 class="text-center">Add Category</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/create-category" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Of Category</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Of Category</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
