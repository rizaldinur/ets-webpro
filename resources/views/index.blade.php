@extends('template')

@section('title', 'home')
@section('content')
    <!-- CAtegories Section Starts Here -->
    <section class="categories my-5">
        <h2 class="text-center">Explore Foods</h2>

        @guest
        @else
            @if (Auth::user()->email == '123@123.123')
                <a href="/add-categories" class="btn btn-primary" style="margin-left:150px;">Add Category</a>
            @endif
        @endguest

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="container row row-cols-1 row-cols-xxl-3 row-cols-md-3 g-4">
            <!-- <a class="card text-white float-container border-0" href="#">
                                                        <img src="images/pizza.jpg" class="card-img" alt="Pizza">
                                                        <div class="card-img-overlay">
                                                            <h5 class="card-title float-text ">Pizza</h5>
                                                        </div>
                                                    </a> -->
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



            <!-- <a class="card text-white float-container border-0" href="#">
                                                                                                                                                <img src="images/momo.jpg" class="card-img" alt="Momo">
                                                                                                                                                <div class="card-img-overlay">
                                                                                                                                                    <h5 class="card-title float-text ">Momo</h5>
                                                                                                                                                </div>
                                                                                                                                            </a> -->

        </div>

    </section>
    <!-- Categories Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            @guest
            @else
                @if (Auth::user()->email == '123@123.123')
                    <a href="/add-foods" class="btn btn-primary my-5">Add Menu</a>
                @endif
            @endguest
            <div class="row">

                @foreach ($foods as $food)
                    <div class="col-md-6">
                        <!--  -->
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-3">
                                    <img width="80%" height="80%" src="{{ $food->image }}"
                                        class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h4>{{ $food->name }}</h4>
                                        <p class="food-price">{{ $food->price }}</p>
                                        <p class="food-detail">
                                            {{ $food->description }}
                                        </p>
                                        <a href="https://api.whatsapp.com/send?phone=6282331157233&text=Halo%20Wow%20Food%20Saya%20Mau%20Beli%20 {{ $food->name }}"
                                            class="btn btn-danger">Order Now</a>
                                        @guest
                                        @else
                                            @if (Auth::user()->email == '123@123.123')
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="/food/destroy/{{ $food->id }}" type="button"
                                                        class="btn btn-warning">Delete</a>
                                                    <a href="/food/edit/{{ $food->id }}" type="button"
                                                        class="btn btn-success">Edit</a>
                                                </div>
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                @endforeach



            </div>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a class="text-danger text-decoration-none" href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
@endsection
