@extends('template')
@section('title', 'Category')
@section('content')

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <h2 class="text-center">Explore Foods</h2>
        @guest
        @else
            @if (Auth::user()->email == '123@123.123')
                <a href="/add-categories" class="btn btn-primary" style="margin-left:150px;">Add Categorie</a>
            @endif
        @endguest

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container row row-cols-1 row-cols-xxl-3 row-cols-md-3 g-4">


            @foreach ($categories as $category)
                @guest
                    <a class="card text-white float-container border-0" href="#">
                        <img src="{{ $category->image }}" class="card-img" alt="{{ $category->image }}">
                        <div class="card-img-overlay">
                            <h5 class="card-title float-text ">{{ $category->name }}</h5>
                        </div>
                    </a>
                @else
                    @if (Auth::user()->email == '123@123.123')
                        <div class="card text-white float-container border-0" href="#">
                            <img src="{{ $category->image }}" class="card-img" alt="{{ $category->image }}">
                            <div class="card-img-overlay">
                                <h5 class="card-title float-text ">{{ $category->name }}</h5>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/category/destroy/{{ $category->id }}" type="button"
                                    class="btn btn-warning">Delete</a>
                                <a href="/category/edit/{{ $category->id }}" type="button" class="btn btn-success">Edit</a>
                            </div>
                        </div>
                    @else
                        <div class="card text-white float-container border-0" href="#">
                            <img src="{{ $category->image }}" class="card-img" alt="{{ $category->image }}">
                            <div class="card-img-overlay">
                                <h5 class="card-title float-text ">{{ $category->name }}</h5>
                            </div>
                        </div>
                    @endif

                @endguest
            @endforeach

        </div>

    </section>
    <!-- Categories Section Ends Here -->
@endsection
