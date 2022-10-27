@extends('template')
@section('title', 'Add Food')
@section('content')
    <div class="container my-5">
        <h1 class="text-center">Add Food</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/create-food" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Of Food</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category Of Food</label>
                <select id="category" name="category" class="form-control @error('title') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price Of Food</label>
                <input type="price" class="form-control @error('title') is-invalid @enderror" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description Of Food</label>
                <input type="description" class="form-control @error('title') is-invalid @enderror" id="description"
                    name="description">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Link Image</label>
                <input type="name" class="form-control @error('title') is-invalid @enderror" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="featured" class="form-label">featured</label>
                <input type="featured" class="form-control @error('title') is-invalid @enderror" id="featured"
                    name="featured">
            </div>
            <div class="mb-3">
                <label for="active" class="form-label">active</label>
                <input type="active" class="form-control @error('title') is-invalid @enderror" id="active" name="active">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
