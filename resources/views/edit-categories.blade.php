@extends('template')
@section('title', 'Edit Category')
@section('content')
    <div class="container  my-5">
        <h1 class="text-center">Edit Categories</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/update-category" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Of Categorie</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="name" name="name"
                    value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Of Categorie</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="image" name="image"
                    value="{{ $category->image }}">
            </div>
            <div class="mb-3">
                <!-- <label for="id" class="form-label">Id</label> -->
                <input type="hidden" class="form-control @error('title') is-invalid @enderror" id="id" name="id"
                    value="{{ $category->id }}">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
